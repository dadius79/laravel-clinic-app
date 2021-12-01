<?php

namespace App\Repositories;

use App\Models\VisitRate;
use App\Contracts\VisitRateContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class VisitRateRepository extends BaseRepository implements VisitRateContract
{
    public function __construct(VisitRate $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listVisitRate(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findVisitRateById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModuleNotFoundException($e->getMessage());
        }
    }

    public function createVisitRate(array $params)
    {
        try {
            $collection = collect($params);

            $visitrate = new VisitRate($collection->all());

            $visitrate->save();

            return $visitrate;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateVisitRate(array $params, $id)
    {
        $visitrate = $this->findVisitRateById($id);

        $collection = collect($params);

        $visitrate->update($collection->all());

        return $visitrate;
    }

    public function deleteVisitRate($id)
    {
        $visitrate = $this->findVisitRateById($id);

        $visitrate->delete();

        return $visitrate;
    }
}