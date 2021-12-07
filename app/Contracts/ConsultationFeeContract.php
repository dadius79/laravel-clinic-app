<?php

namespace App\Contracts;

interface ConsultationFeeContract
{
    public function listConsultationFees(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findConsultationFeeById(int $id);

    public function createConsultationFee(array $params);

    public function updateConsultationFee(array $params, $id);

    public function deleteConsultationFee($id);
}