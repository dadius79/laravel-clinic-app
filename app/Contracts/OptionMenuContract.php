<?php
namespace App\Contracts;

interface OptionMenuContract
{
    public function listOptionMenu(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findOptionMenuById(int $id);
    
    public function createOptionMenu(array $params);

    public function updateOptionMenu(array $params, $id);

    public function deleteOptionMenu($id);
}