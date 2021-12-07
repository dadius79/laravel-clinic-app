<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\MedicineContract;

class MedicineController extends BaseController
{
    //
    protected $medicineRepository;

    public function __construct(MedicineContract $medicineRepository){
        $this->medicineRepository = $medicineRepository;
    }

    public function index(){
        $medicine = $this->medicineRepository->listMedicine();
        return $this->sendResponse($medicine, 'Medicine Fetched Successfully.');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'code' => 'required|string',
            'type' => 'required|string',
            'rate_per_unit' => 'required|integer',
            'quantity' => 'required|integer',
            'in_stock' => 'required|boolean',
            'expiry_date' => 'required|date'
        ]);

        $params = $request->all();

        $medicine = $this->medicineRepository->createMedicine($params);

        if(!$medicine){
            //Find Proper Error Reporting Feature
            $error = 'Please Try Again';
            return $this->sendError('Medicine Creation Error', $error);
        }

        $success['name'] = $params['name'];

        return $this->sendResponse($success, 'Medicine created successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'string',
            'code' => 'string',
            'type' => 'string',
            'rate_per_unit' => 'integer',
            'quantity' => 'integer',
            'in_stock' => 'boolean',
            'expiry_date' => 'date'
        ]);

        $params = $request->all();

        $medicine = $this->medicineRepository->updateMedicine($params, $id);

        if(!$medicine){
            //Find Proper Error Reporting Feature
            $error = 'Please Try Again';
            return $this->sendError('Medicine Edit Error', $error);
        }

        $success['name'] = $params['name'];

        return $this->sendResponse($success, 'Medicine edited successfully.');
    }

    public function delete($id)
    {
        $medicine = $this->medicineRepository->deleteMedicine($id);

        if(!$medicine){
            //Find Proper Error Reporting Feature
            $error = 'Please Try Again';
            return $this->sendError('Medicine Delete Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Medicine deleted successfully.');
    }
}
