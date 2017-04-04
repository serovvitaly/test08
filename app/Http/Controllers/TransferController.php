<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Services\TransactionServiceInterface;
use App\Wallet;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.transfer', [
            'wallets' => Wallet::all(),
            'currencies' => Currency::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TransactionServiceInterface $transactionService)
    {
        $transactionService->doTransfer($request->all());
        return redirect('transaction');
    }
}
