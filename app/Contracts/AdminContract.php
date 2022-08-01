<?php

namespace App\Contracts;

interface AdminContract
{
    public function listAdmin(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function listAdminByRole(string $whereColumn = 'admin_role', int $id, array $columns = ['*'], string $order = 'id', string $sort = 'desc');
}