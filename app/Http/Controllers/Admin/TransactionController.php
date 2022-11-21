<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Payment;

class TransactionController extends Controller
{
    public function index(){
        $title = 'Transactions';
        $data = Transaction::with('user')
                        ->with('product')
                        ->get();
        return view('admin.transactions.index', compact([
            'title', 'data'
        ]));
    }

    public function unpaid($id){
        $title = 'Transaction Detail';
        $data = Transaction::with('user')
                        ->with('product')
                        ->withCount('payment')
                        ->where('transaction_id', $id)
                        ->first();
        return view('admin.transactions.unpaid', compact([
            'title', 'data'
        ]));
    }

    public function show($id){
        $title = 'Transaction Detail';
        $data = Payment::with('transaction')
                        ->where('transaction_id', $id)
                        ->first();
        return view('admin.transactions.show', compact([
            'title', 'data'
        ]));
    }
}
