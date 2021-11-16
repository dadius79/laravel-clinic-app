<?php 

namespace App\Contracts;

interface BaseContract
{
    /*Create a model instance*/
    public function create(array $attributes);

    /*Update a model instance*/
    public function update(array $attributes, int $id);

    /*Return all model rows*/
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc');

    /*Find one by ID*/
    public function find(int $id);

    /*Find one by ID or throw exception*/
    public function findOneOrFail(int $id);

    /*Find based on a different column*/
    public function findBy(array $data);

    /*Find one based on a different column*/
    public function findOneBy(array $data);

    /*Find one based on a different column or throw exception*/
    public function findOneByOrFail(array $data);

    /*Delete one by ID*/
    public function delete(int $id);
}