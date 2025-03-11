<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Метод для отображения транзакции по ID
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id); 
                return view('transactions.show', compact('transaction'));
    }
}
