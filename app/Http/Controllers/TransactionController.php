<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
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

    public function getReportForm()
    {
        return view('report.form', [
            'wallets' => \App\Wallet::all(),
        ]);
    }

    protected function getFromDate(Request $request)
    {
        $date = $request->get('from_date');
        if (!$date) {
            return null;
        }
        return new \DateTime($date);
    }

    protected function getToDate(Request $request)
    {
        $date = $request->get('to_date');
        if (!$date) {
            return null;
        }
        return new \DateTime($date);
    }

    public function getReport(Request $request, TransactionService $transactionService)
    {
        $wallet = \App\Wallet::findOrFail($request->get('wallet_id'));

        $fromDate = $this->getFromDate($request);
        $toDate = $this->getToDate($request);

        $items = $transactionService->getWalletTransactions($request->get('wallet_id'), $fromDate, $toDate);

        $usd_total_sum = 0;

        foreach ($items as $item) {
            $usd_total_sum += $item->amount;
        }

        $usdCurrency = \App\Currency::where('code', 'USD')->first();

        $usdMoney = new \domain\Money($usdCurrency, $usd_total_sum);

        $walletMoney = \domain\CurrencyBrokerService::conversionCurrency($usdMoney, $wallet->currency);

        return view('report.index', [
            'fromDate' => !$fromDate ? null : $fromDate->format('Y-m-d'),
            'toDate' => !$toDate ? null : $toDate->format('Y-m-d'),
            'client' => $wallet->client,
            'wallet' => $wallet,
            'usd_total_sum' => $usd_total_sum,
            'total_sum' => $walletMoney->getAmount(),
            'items' => $items,
        ]);
    }

    public function exportReport(Request $request, TransactionService $transactionService)
    {
        $items = $transactionService->getWalletTransactions(
            $request->get('wallet_id'),
            $this->getFromDate($request),
            $this->getToDate($request)
        );

        /** @var \App\Transaction $item */
        $rows = ['TID;Client Name;Wallet;Operation;Currency;Amount'];
        foreach ($items as $item) {
            $rows[] = implode(';', [
                $item->id,
                $item->client->full_name(),
                $item->wallet->title,
                $item->getType(),
                $item->currency->code,
                $item->amount,
            ]);
        }

        header('Content-Disposition: attachment; filename="export.csv"');
        header("Cache-control: private");
        header("Content-type: application/force-download");
        header("Content-transfer-encoding: binary\n");

        echo implode("\n\r", $rows);

        exit;
    }
}
