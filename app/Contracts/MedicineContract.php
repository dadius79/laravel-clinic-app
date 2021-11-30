<?php
namespace App\Contracts;

interface MedicineContract
{
    public function listMedicine(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findMedicineById(int $id);

    public function createMedicine(array $params);

    public function updateMedicine(array $params, $id);

    public function deleteMedicine($id);
}