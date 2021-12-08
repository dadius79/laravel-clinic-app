<?php

namespace App\Contracts;

interface BillingContract
{
    public function listBills(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function createBill(array $params);

    public function updateBill(array $params, $id);

    public function deleteBill($id);
}