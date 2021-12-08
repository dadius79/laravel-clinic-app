<?php

namespace App\Contracts;

interface PrescriptionContract
{
    public function listPrescriptions(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function createPrescription(array $params);

    public function updatePrescription(array $params, $id);

    public function deletePrescription($id);
}