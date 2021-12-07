<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\VisitContract;

class VisitController extends BaseController
{
    public function __construct(VisitContract $visitRepository){
        $this->visitRepository = $visitRepository;
    }

    public function index(){
        $visit = $this->visitRepository->listVisits();
        return $this->sendResponse($visit, 'Visits Fetched Successfully.');
    }

    public function store(Request $request){
        $this->validate($request, [
            'patient_id' => 'required|integer',
            'consultation' => 'required|boolean',
            'doctor_id' => 'integer',
            'over_the_counter' => 'required|boolean',
            'status' => 'required|string',
            'created_by' => 'required|integer'
        ]);

        $params = $request->all();

        $visit = $this->visitRepository->createVisit($params);

        if(!$visit){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Visit Creation Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Visit Created Successfully');
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'patient_id' => 'integer',
            'consultation' => 'boolean',
            'doctor_id' => 'integer',
            'over_the_counter' => 'boolean',
            'status' => 'string',
            'created_by' => 'integer'
        ]);

        $params = $request->all();

        $visit = $this->visitRepository->updateVisit($params, $id);

        if(!$visit){
            //Find Proper Error Reporting Code
            $error = 'Please Try Again';
            return $this->sendError('Visit Edit Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Visit Edited Successfully.');
    }

    public function delete($id)
    {
        $visit = $this->visitRepository->deleteVisit($id);

        if(!$visit){
            //Find Proper Error Reporting code
            $error = 'Please Try Again';
            return $this->sendError('Visit Delete Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Visit Deleted Successfully.');
    }
}
