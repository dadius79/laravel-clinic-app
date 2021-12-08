<?php

namespace App\Repositories;

use App\Models\Prescription;
use App\Contracts\PrescriptionContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class PrescriptionRepository extends BaseRepository implements PrescriptionContract
{
    public function __construct(Prescription $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listPrescriptions(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findPrescriptionById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e->getMessage());
        }
    }

    public function createPrescription(array $params)
    {
        try{
            $collection = collect($params);

            $prescription = new Prescription($collection->all());

            $prescription->save();

            return $prescription;
        } catch (QueryException $exception){
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updatePrescription(array $params, $id)
    {
        $prescription = $this->findPrescriptionById($id);

        $collection = collect($params);

        $prescription->update($collection->all());

        return $prescription;
    }

    public function deletePrescription($id)
    {
        $prescription = $this->findPrescriptionById($id);

        $prescription->delete();

        return $prescription;
    }
}