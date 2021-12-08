<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\PrescriptionContract;

class PrescriptionController extends BaseController
{
    public function __construct(PrescriptionContract $prescriptionRepository)
    {
        $this->prescriptionRepository = $prescriptionRepository;
    }

    public function index(){
        $prescription = $this->prescriptionRepository->listPrescriptions();
        return $this->sendResponse($prescription, 'Prescriptions Fetched Successfully.');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'visit_id' => 'required|integer',
            'medicine_code' => 'required|string',
            'strength' => 'required|string',
            'dose' => 'required|string',
            'quantity' => 'required|integer',
            'amount' => 'required|integer',
            'issuance' => 'required|in:Pending,Completed,Cancelled',
            'prescribed_by' => 'required|integer',
            'issued_by' => 'integer'
        ]);

        $params = $request->all();

        $prescription = $this->prescriptionRepository->createPrescription($params);

        if(!$prescription){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Prescription Creation Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Prescription Created Successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            /*'visit_id' => 'integer',*/
            'medicine_code' => 'string',
            'strength' => 'string',
            'dose' => 'string',
            'quantity' => 'integer',
            'amount' => 'integer',
            'issuance' => 'in:Pending,Completed,Cancelled',
            'prescribed_by' => 'integer',
            'issued_by' => 'integer'
        ]);

        $params = $request->except(['visit_id']);

        $prescription = $this->prescriptionRepository->updatePrescription($params, $id);

        if(!$prescription){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Prescription Edit Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Prescription Edited Successfully');
    }

    public function delete($id)
    {
        $prescription = $this->prescriptionRepository->deletePrescription($id);

        if(!$prescription)
        {
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Prescription Delete Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Prescription Deleted Successfully.');
    }
}
