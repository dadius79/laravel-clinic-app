<?php

namespace App\Repositories;

use App\Models\SubMenu;
use App\Contracts\SubMenuContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class SubMenuRepository extends BaseRepository implements SubMenuContract
{
    public function __construct(SubMenu $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listSubMenu(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findSubMenuById(int $id){
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModuleNotFoundException($e->getMessage());
        }
    }

    public function createSubMenu(array $params){
        try {
            $collection = collect($params);

            $submenu = new SubMenu($collection->all());

            $submenu->save();
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateSubMenu(array $params, $id){
        $submenu = $this->findSubMenuById($id);

        $collection = collect($params);

        $submenu->update($collection->all());

        return $submenu;
    }

    public function deleteSubMenu($id){
        $submenu = $this->findSubMenuById($id);

        $submenu->delete();

        return $submenu;
    }
}
