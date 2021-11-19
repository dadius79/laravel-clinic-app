<?php

namespace App\Repositories;

use App\Models\Menu;
//use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\MenuContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class MenuRepository extends BaseRepository implements MenuContract
{
    public function __construct(Menu $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listMenu(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findMenuById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModuleNotFoundException($e->getMessage());
        }
    }

    public function createMenu(array $params)
    {
        try {
            $collection = collect($params);

            $menu = new Menu($collection->all());

            $menu->save();

            return $menu;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateMenu(array $params){

        $menu = $this->findMenuById($params['id']);

        $collection = collect($params);

        $menu->update($collection->all());

        return $menu;
    }

    public function deleteMenu($id){
        $menu = $this->findMenuById($id);

        $menu->delete();

        return $menu;
    }
}