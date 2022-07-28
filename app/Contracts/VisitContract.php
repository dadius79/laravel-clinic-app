<?php

namespace App\Contracts;

interface VisitContract
{
    public function listVisits(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function listVisitsByPatientId(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findVisitById(int $id);

    public function createVisit(array $params);

    public function updateVisit(array $params, $id);

    public function deleteVisit($id);
}