<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\ConsultationFeeContract;

class ConsultationFeeController extends BaseController
{
    public function __construct(ConsultationFeeContract $consultationFeeRepository){
        $this->consultationFeeRepository = $consultationFeeRepository;
    }

    public function index(){
        $consultationfee = $this->consultationFeeRepository->listConsultationFees();
        return $this->sendResponse($consultationfee, 'Consultation Fees Fetched Successfully.');
    }

    public function store(Request $request){
        $this->validate($request, [
            'doctor_id' => 'required|integer',
            'fees' => 'required|integer',
            'active' => 'required|boolean'
        ]);

        $params = $request->all();

        $consultationfee = $this->consultationFeeRepository->createConsultationFee($params);

        if(!$consultationfee){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Consultation Fee Creation Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Consultation Fee Created successfully');
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'doctor_id' => 'integer',
            'fees' => 'integer',
            'active' => 'boolean'
        ]);

        $params = $request->all();

        $consultationfee = $this->consultationFeeRepository->updateConsultationFee($params, $id);

        if(!$consultationfee){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Consultation Fee Edit Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Consultation Fee Edited Successfully.');
    }

    public function delete($id)
    {
        $consultationfee = $this->consultationFeeRepository->deleteConsultationFee($id);

        if(!$consultationfee){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Consultation Fee Delete Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Consultation Fee Deleted Successfully.');
    }
}
