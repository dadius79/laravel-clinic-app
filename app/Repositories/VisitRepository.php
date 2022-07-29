<?php

namespace App\Repositories;

use App\Models\Visit;
use App\Contracts\VisitContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class VisitRepository extends BaseRepository implements VisitContract
{
    public function __construct(Visit $model){
        parent::__construct($model);
        $this->model = $model;
    }

    public function listVisits(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function listVisitsByPatientId(string $whereColumn = 'patient_id', int $id, array $columns = ['*'], string $order = 'id', string $sort = 'desc')
    {
        return $this->allById($whereColumn, $id, $columns, $order, $sort);
    }

    public function findVisitById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModuleNotFoundException($e->getMessage());
        }
    }

    public function createVisit(array $params)
    {
        try {
            $collection = collect($params);

            $visit = new Visit($collection->all());

            $visit->save();

            return $visit;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateVisit(array $params, $id)
    {
        $visit = $this->findVisitById($id);

        $collection = collect($params);

        $visit->update($collection->all());

        return $visit;
    }

    public function deleteVisit($id){
        $visit = $this->findVisitById($id);

        $visit->delete();

        return $visit;
    }
}