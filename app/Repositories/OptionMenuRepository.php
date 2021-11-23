<?php

namespace App\Repositories;

use App\Models\OptionMenu;
use App\Contracts\OptionMenuContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class OptionMenuRepository extends BaseRepository implements OptionMenuContract
{
    public function __construct(OptionMenu $model){
        parent::__construct($model);
        $this->model = $model;
    }

    public function listOptionMenu(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findOptionMenuById(int $id){
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModuleNotFoundException($e->getMessage());
        }
    }
    
    public function createOptionMenu(array $params){
        try{
            $collection = collect($params);

            $optionmenu = new OptionMenu($collection->all());

            $optionmenu->save();

            return $optionmenu;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateOptionMenu(array $params, $id){
        $optionmenu = $this->findOptionMenuById($id);

        $collection = collect($params);

        $optionmenu->update($collection->all());

        return $optionmenu;
    }

    public function deleteOptionMenu($id){
        $optionmenu = $this->findOptionMenuById($id);

        $optionmenu->delete();

        return $optionmenu;
    }
}