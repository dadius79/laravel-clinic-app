<?php

namespace App\Contracts;

interface VisitContract
{
    public function listVisits(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function listVisitsByPatientId(string $whereColumn = 'patient_id', int $id, array $columns = ['*'], string $order = 'id', string $sort = 'desc');

    public function findVisitById(int $id);

    public function createVisit(array $params);

    public function updateVisit(array $params, $id);

    public function deleteVisit($id);
}