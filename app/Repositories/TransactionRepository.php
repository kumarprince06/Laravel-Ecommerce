<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function createTransaction(array $transactionData)
    {
        return Transaction::create($transactionData);
    }

    public function getTransactionByOrderId(int $orderId)
    {
        return Transaction::where('order_id', $orderId)->first();
    }
}
