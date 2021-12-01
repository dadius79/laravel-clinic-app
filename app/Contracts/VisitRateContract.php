<?php 

namespace App\Contracts;

interface VisitRateContract
{
    public function listVisitRate(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findVisitRateById(int $id);

    public function createVisitRate(array $params);

    public function updateVisitRate(array $params, $id);

    public function deleteVisitRate($id);
}