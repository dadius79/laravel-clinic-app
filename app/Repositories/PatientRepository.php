<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Contracts\PatientContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class PatientRepository extends BaseRepository implements PatientContract
{
    public function __construct(Patient $model){
        parent::__construct($model);
        $this->model = $model;
    }

    public function listPatient(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findPatientById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModuleNotFoundException($e->getMessage());
        }
    }

    public function createPatient(array $params)
    {
        try {
            $collection = collect($params);

            $patient = new Patient($collection->all());

            $patient->save();

            return $patient;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updatePatient(array $params, $id)
    {
        $patient = $this->findPatientById($id);

        $collection = collect($params);

        $patient->update($collection->all());

        return $patient;
    }

    public function deletePatient($id)
    {
        $patient = $this->findPatientById($id);

        $patient->delete();

        return $patient;
    }
}