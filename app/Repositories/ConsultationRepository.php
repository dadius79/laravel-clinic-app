<?php 

namespace App\Repositories;

use App\Models\Consultation;
use App\Contracts\ConsultationContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ConsultationRepository extends BaseRepository implements ConsultationContract
{
    public function __construct(Consultation $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listConsultations(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findConsultationById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e->getMessage());
        }
    }

    public function createConsultation(array $params)
    {
        try {
            $collection = collect($params);

            $consultation = new Consultation($collection->all());

            $consultation->save();

            return $consultation;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateConsultation(array $params, $id)
    {
        $consultation = $this->findConsultationById($id);

        $collection = collect($params);

        $consultation->update($collection->all());

        return $consultation;
    }

    public function deleteConsultation($id)
    {
        $consultation = $this->findConsultationById($id);

        $consultation->delete();

        return $consultation;
    }
}