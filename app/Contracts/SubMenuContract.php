<?php
namespace App\Contracts;

interface SubMenuContract
{
    public function listSubMenu(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findSubMenuById(int $id);

    public function createSubMenu(array $params);

    public function updateSubMenu(array $params, $id);

    public function deleteSubMenu($id);
}