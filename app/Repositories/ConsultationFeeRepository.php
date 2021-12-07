<?php

namespace App\Repositories;

use App\Models\ConsultationFee;
use App\Contracts\ConsultationFeeContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ConsultationFeeRepository extends BaseRepository implements ConsultationFeeContract
{
    public function __construct(ConsultationFee $model){
        parent::__construct($model);
        $this->model = $model;
    }

    public function listConsultationFees(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findConsultationFeeById(int $id){
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModuleNotFoundException($e->getMessage());
        }
    }

    public function createConsultationFee(array $params)
    {
        try {
            $collection = collect($params);

            $consultationfee = new ConsultationFee($collection->all());

            $consultationfee->save();

            return $consultationfee;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateConsultationFee(array $params, $id)
    {
        $consultationfee = $this->findConsultationFeeById($id);

        $collection = collect($params);

        $consultationfee->update($collection->all());

        return $consultationfee;
    }

    public function deleteConsultationFee($id)
    {
        $consultationfee = $this->findConsultationFeeById($id);

        $consultationfee->delete();

        return $consultationfee;
    }
}