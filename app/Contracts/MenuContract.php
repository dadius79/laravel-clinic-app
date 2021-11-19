<?php
namespace App\Contracts;

interface MenuContract
{
    public function listMenu(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findMenuById(int $id);

    public function createMenu(array $params);

    public function updateMenu(array $params);

    public function deleteMenu($id);
}