<?php

namespace App\Repositories;

use App\Models\Billing;
use App\Contracts\BillingContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class BillingRepository extends BaseRepository implements BillingContract
{
    public function __construct(Billing $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listBills(string $order = 'id', string $sort = 'desc', array $columns = ['*']){
        return $this->all($columns, $order, $sort);
    }

    public function findBillById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e->getMessage());
        }
    }

    public function createBill(array $params)
    {
        try{
            $collection = collect($params);

            $bill = new Billing($collection->all());

            $bill->save();

            return $bill;
        } catch (QueryException $exception){
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateBill(array $params, $id)
    {
        $bill = $this->findBillById($id);

        $collection = collect($params);

        $bill->update($collection->all());

        return $bill;
    }

    public function deleteBill($id)
    {
        $bill = $this->findBillById($id);

        $bill->delete();

        return $bill;
    }
}