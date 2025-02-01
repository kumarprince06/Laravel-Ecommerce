<?php

namespace App\Services\Transaction;

use App\Repositories\Interfaces\TransactionRepositoryInterface;


class TransactionService implements TransactionServiceInterface
{
    protected $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function createTransaction(object $transactionData, int $orderId)
    {

        $transactionData = [
            'order_id' => $orderId,
            'stripe_transaction_id' => $transactionData->id,
            'amount' => $transactionData->amount_total / 100,
            'currency' => $transactionData->currency,
            'status' => $transactionData->status,
            'metadata' => $transactionData->metadata->name . ' ' . $transactionData->metadata->phone,
        ];

        // dd($transactionData);
        return $this->transactionRepository->createTransaction($transactionData);
    }

    public function getTransactionByOrderId(int $orderId)
    {
        return $this->transactionRepository->getTransactionByOrderId($orderId);
    }
}
