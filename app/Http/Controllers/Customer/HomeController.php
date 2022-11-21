<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request){
        $title = 'Dashboard';
        if($request->search == null){
            $data = Product::with('brand')
                        ->with('type')
                        ->get();
        }else{
            $data = Product::with('brand')
                        ->with('type')
                        ->where('name', 'like', "%" . $request->search . "%")
                        ->get();
        }
        
        return view('customer.home.index', compact([
            'title', 'data'
        ]));
    }

    public function show($id){
        $title = 'Product';
        $data = Product::with('brand')
                        ->with('type')
                        ->where('id', $id)
                        ->first();
        return view('customer.home.show', compact([
            'title', 'data'
        ]));
    }

    public function showbybrand($id){
        $title = 'Product';
        $data = Product::with('brand')
                        ->with('type')
                        ->where('brand_id', $id)
                        ->get();
        return view('customer.home.index', compact([
            'title', 'data'
        ]));
    }

    public static function brand(){
        $brands = Brand::all();
        return $brands;
    }

    public function profile(){
        $title = 'Profile';
        return view('customer.users.profile', compact([
            'title'
        ]));
    }

    public function update_profile(Request $request){
        // ddd($request->all());
        $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'required',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image_name = null;
        if(auth()->user()->photo && file_exists(storage_path('app/public/'. auth()->user()->photo))){
            Storage::delete(['public/', auth()->user()->photo]);
        }
        
        if($request->photo != null){
            $image_name = $request->file('photo')->store('img-profile', 'public');
        }

        User::where('id', auth()->user()->id)
            ->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'photo' => ($image_name == null) ? auth()->user()->photo : $image_name
            ]);

        return redirect()->back()
                         ->with('success', 'Profile successfully changed at '. Carbon::now());
    }

    public function update_password(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password|min:6'
        ]);
        
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect()->back()
                    ->with('success', 'Password successfully changed at '.Carbon::now());
    }
}
