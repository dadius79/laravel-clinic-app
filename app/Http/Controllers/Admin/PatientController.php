<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\PatientContract;

class PatientController extends BaseController
{
    protected $patientRepository;

    public function __construct(PatientContract $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function index(){
        $patient = $this->patientRepository->listPatient();
        return $this->sendResponse($patient, 'Patient Fetched.');
    }

    public function find($id){
        $patient = $this->patientRepository->findPatientById($id);
        if(!$patient){
            //Find Proper Error Reporting Feature
            $error = 'Patient Not Found, Please Try Again';
            return $this->sendError('Patient Find Error', $error);
        }
        return $this->sendResponse($patient, 'Patient Fetched Successfully');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'date_of_birth' => 'required|date',
            'sex' => 'required|in:Male,Female',
            'national_status' => 'required|in:Citizen,Foreigner',
            'national_id' => 'required|integer|unique:patients',
            'address' => 'required|string',
            'phone_number' => 'required|min:10|max:10|unique:patients',
            'registered_by' => 'required|integer'
        ]);
        
        $params = $request->all();

        $patient = $this->patientRepository->createPatient($params);

        if(!$patient){
            //Find Proper Error Reporting Feature
            $error = 'Please Try Again';
            return $this->sendError('Patient Creation Error', $error);
        }

        $success['name'] = $params['name'];

        return $this->sendResponse($success, 'Patient created successfully');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'string',
            'date_of_birth' => 'date',
            'sex' => 'in:Male,Female',
            'national_status' => 'in:Citizen,Foreigner',
            'national_id' => 'integer|unique:patients',
            'address' => 'string',
            'phone_number' => 'min:10|max:10|unique:patients',
            'registered_by' => 'integer'
        ]);

        $params = $request->all();

        $patient = $this->patientRepository->updatePatient($params, $id);

        if(!$patient){
            //Find Proper Error Reporting Feature
            $error = 'Please Try Again';
            return $this->sendError('Patient Edit Error', $error);
        }

        $success['name'] = $params['name'];

        return $this->sendResponse($success, 'Patient edited successfully');
    }

    public function delete($id)
    {
        $patient = $this->patientRepository->deletePatient($id);

        if(!$patient){
            //Find Proper Error Reporting Feature
            $error = 'Please Try Again';
            return $this->sendError('Patient Delete Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Patient deleted successfully.');
    }
}
