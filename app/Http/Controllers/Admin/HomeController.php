<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
    //    dd('ok');
        $title = 'Dashboard';
        return view('admin.home.index', compact([
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

    public function change_password(){
        $title = 'Change Password';
        return view('admin.home.change_password', compact('title'));
    }

    public function update_password(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password|min:6'
        ]);
        
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/admin/home')->with('success', 'Password successfully changed at '.Carbon::now());
    }
}
