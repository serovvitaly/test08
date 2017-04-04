<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $items = Transaction::paginate(20);

        return view('transaction.index', [
            'items' => $items,
        ]);
    }
}
