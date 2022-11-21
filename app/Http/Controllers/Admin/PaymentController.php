<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use PDF;

class PaymentController extends Controller
{
    public function index()
    {
        $title = 'Payments';
        $data = Payment::with('transaction')
            ->get();
        return view('admin.payments.index', compact([
            'title', 'data'
        ]));
    }

    public function show($id)
    {
        $title = 'Transaction Detail';
        $data = Payment::with('transaction')
            ->where('transaction_id', $id)
            ->first();
        return view('admin.payments.show', compact([
            'title', 'data'
        ]));
    }

    public function update(Request $request, $id)
    {
        $data = Transaction::with('user')->with('product')
            ->where('transaction_id', $id)
            ->first();
        if ($request->pay == $data->total) {
            Payment::create([
                'transaction_id' => $data->transaction_id,
                'date_payment' => Carbon::now(),
                'pay' => $request->pay,
                'status' => 'paid'
            ]);
            return redirect('/admin/payment')
                ->with('success', 'Pembarayan berhasil, terima kasih!');
        } else {
            return redirect()->back()
                ->with('danger', 'Uang anda harus pas tidak boleh lebih ataupun kurang!, terima kasih!');
        }
    }

}
