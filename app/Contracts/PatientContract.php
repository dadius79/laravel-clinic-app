<?php

namespace App\Contracts;

interface PatientContract
{
    public function listPatient(string $order = 'id', string $sort = 'desc', array $colums = ['*']);

    public function findPatientById(int $id);

    public function createPatient(array $params);

    public function updatePatient(array $params, $id);

    public function deletePatient($id);
}