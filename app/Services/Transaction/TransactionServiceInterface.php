<?php

namespace App\Services\Transaction;

use Illuminate\Http\Request;

interface TransactionServiceInterface
{
    public function createTransaction(object $transactionData, int $orderId);
    public function getTransactionByOrderId(int $orderId);
}
