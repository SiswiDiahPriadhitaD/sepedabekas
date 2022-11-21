<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index(){
        $title = 'Transactions';
        $data = Transaction::with('user')
                    ->with('product')
                    ->withCount('payment')
                    ->where('user_id', auth()->user()->id)
                    ->get();
        return view('customer.transactions.index', compact([
            'data', 'title'
        ]));
    }

    public function store(Request $request){
        $trID = Str::random(10);
        // dd($request->all());
        Transaction::create([
            'transaction_id' => strtoupper($trID),
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'order_date' => Carbon::now(),
            'information' => $request->information,
            'total' => $request->total
        ]);

        return redirect()->to('/transaction')
                         ->with('success', 'Silahkan lakukan pembayaran dan konfirmasi ke admin! '. Carbon::now());
    }

    public function show($id){
        $title = 'Transactions';
        $data = Transaction::with('user')
                    ->with('product')
                    ->withCount('payment')
                    ->where('transaction_id', $id)
                    ->first();
        return view('customer.transactions.show', compact([
            'data', 'title'
        ]));
    }
}
