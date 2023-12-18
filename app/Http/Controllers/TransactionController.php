<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with([
            'package',
            'user'
        ])->get();
        // dd($transaction);
        return view('Admin.Transactions.index', ['transactions' => $transactions]);
    }
}
