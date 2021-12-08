<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\BillingContract;

class BillingController extends BaseController
{
    public function __construct(BillingContract $billingRepository)
    {
        $this->billingRepository = $billingRepository;
    }

    public function index()
    {
        $bill = $this->billingRepository->listBills();
        return $this->sendResponse($bill, 'Bills Fetched Successfully');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'visit_id' => 'required|integer',
            'balance' => 'required|integer',
            'paid' => 'integer', 
            'served_by' => 'required|integer',
            'status' => 'required|in:Pending,Completed'
        ]);

        $params = $request->all();

        $bill = $this->billingRepository->createBill($params);

        if(!$bill){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Bill Creation Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Bill Created Successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            /*'visit_id' => 'integer',*/
            'balance' => 'integer',
            'paid' => 'integer', 
            'served_by' => 'integer',
            'status' => 'in:Pending,Completed'
        ]);

        $params = $request->except(['visit_id']);

        $bill = $this->billingRepository->updateBill($params, $id);

        if(!$bill){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Bill Edit Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Bill Edited Successfully');
    }

    public function delete($id){
        $bill = $this->billingRepository->deleteBill($id);

        if(!$bill){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Bill Deletion Error', $error);
        }

        return $this->sendResponse($success, 'Bill Deleted Successfully');
    }

}
