<?php

namespace App\Repositories;

use App\Models\Medicine;
use App\Contracts\MedicineContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class MedicineRepository extends BaseRepository implements MedicineContract
{
    public function __construct(Medicine $model){
        parent::__construct($model);
        $this->model = $model;
    }

    public function listMedicine(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findMedicineById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModuleNotFoundException($e->getMessage());
        }
    }

    public function createMedicine(array $params)
    {
        try {
            $collection = collect($params);

            $medicine = new Medicine($collection->all());

            $medicine->save();

            return $medicine;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateMedicine(array $params, $id)
    {
        $medicine = $this->findMedicineById($id);

        $collection = collect($params);

        $medicine->update($collection->all());

        return $medicine;
    }

    public function deleteMedicine($id)
    {
        $medicine = $this->findMedicineById($id);

        $medicine->delete();

        return $medicine;
    }
}