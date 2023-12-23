<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $package = Package::find($request->package_id);
        $custumer = auth()->user();

        $transaction = Transaction::create([
            'package_id' => $package->id,
            'user_id' => $custumer->id,
            'amount' => $package->price,
            'transaction_code' => strtoupper(Str::random(10)),
        ]);
        \Midtrans\Config::$serverKey = 'SB-Mid-server-mHIoKH1bZqUEhDVaIynYVlbN';
        \Midtrans\Config::$isProduction = (bool) env(' MIDTRANS_IS_PRODUCTION');
        \Midtrans\Config::$isSanitized = (bool) env('MIDTRANS_IS_SANITIZED');
        \Midtrans\Config::$is3ds = (bool) env('MIDTRANS_IS_3DS');

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction->transaction_code,
                'gross_amount' => $transaction->amount,
            ),
            'customer_details' => array(
                'first_name' => $custumer->name,
                'last_name' => $custumer->name,
                'email' => $custumer->email,
                
            ),
        );
$CreateMidtransTransaction =  \Midtrans\Snap::createTransaction($params);       
$MidtransRedirectUrl = $CreateMidtransTransaction->redirect_url;

return redirect($MidtransRedirectUrl);



    }
}
