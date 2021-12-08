<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\ConsultationContract;

class ConsultationController extends BaseController
{
    public function __construct(ConsultationContract $consultationRepository)
    {
        $this->consultationRepository = $consultationRepository;
    }

    public function index(){
        $consultation = $this->consultationRepository->listConsultations();
        return $this->sendResponse($consultation, 'Consultations Fetched Successfully.');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'visit_id' => 'required|integer',
            'details' => 'string',
            'consultation_fee' => 'required|integer',
            'status' => 'required|string'
        ]);

        $params = $request->all();

        $consultation = $this->consultationRepository->createConsultation($params);

        if(!$consultation){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Consultation Creation Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Consultation Created Successfully');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            /*'visit_id' => 'integer',*/
            'details' => 'string',
            'consultation_fee' => 'integer',
            'status' => 'required|string'
        ]);

        $params = $request->except(['visit_id']);

        $consultation = $this->consultationRepository->updateConsultation($params, $id);

        if(!$consultation){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Consultation Edit Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Consultation Edited Successfully');
    }

    public function delete($id)
    {
        $consultation = $this->consultationRepository->deleteConsultation($id);

        if(!$consultation){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Consultation Delete Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Consultation Deleted Successfully.');
    }
}
