<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\VisitContract;
use App\Models\Visit;
use App\Models\Admin;
use App\Models\Patient;

class VisitController extends BaseController
{
    public function __construct(VisitContract $visitRepository){
        $this->visitRepository = $visitRepository;
    }

    public function index(){
        $visits = DB::table('visits')
            ->join('patients', 'visits.patient_id', '=', 'patients.id')
            ->join('admins', 'visits.doctor_id', '=', 'admins.id')
            ->select('visits.*', 'patients.name as patient_name', 'admins.name as doctor_name')
            ->orderBy('id', 'desc')
            ->get(['*']);
        //$visit = $this->visitRepository->listVisits();
        return $this->sendResponse($visits, 'Visits Fetched Successfully.');
    }

    public function list($id){
        $visits = DB::table('visits')
            ->join('patients', 'visits.patient_id', '=', 'patients.id')
            ->join('admins', 'visits.doctor_id', '=', 'admins.id')
            ->select('visits.*', 'patients.name as patient_name', 'admins.name as doctor_name')
            ->where('patient_id', $id)
            ->orderBy('id', 'desc')
            ->get(['*']);
        return $this->sendResponse($visits, 'Patient Visits Fetched Successfully.');
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
