<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Contracts\AdminContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class AdminRepository extends BaseRepository implements AdminContract
{
    public function __construct(Admin $model){
        parent::__construct($model);
        $this->model = $model;
    }

    public function listAdmin(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function listAdminByRole(string $whereColumn = 'admin_role', int $id, array $columns = ['*'], string $order = 'id', string $sort = 'desc')
    {
        return $this->allById($whereColumn, $id, $columns, $order, $sort);
    }
}