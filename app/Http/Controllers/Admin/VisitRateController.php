<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\VisitRateContract;

class VisitRateController extends BaseController
{
    protected $visitRateRepository;

    public function __construct(VisitRateContract $visitRateRepository)
    {
        $this->visitRateRepository = $visitRateRepository;
    }

    public function index()
    {
        $visitrate = $this->visitRateRepository->listVisitRate();
        return $this->sendResponse($visitrate, 'Visit Rate Fetched.');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'visit_type' => 'required|string',
            'rate' => 'required|integer',
            'available' => 'required|boolean'
        ]);

        $params = $request->all();

        $visitrate = $this->visitRateRepository->createVisitRate($params);

        if(!$visitrate){
            //Find Proper Error Reporting Feature
            $error = 'Please Try Again';
            return $this->sendError('Visit Rate Creation Error', $error);
        }

        $success['visit_type'] = $params['visit_type'];

        return $this->sendResponse($success, 'Visit Rate Created Successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'visit_type' => 'string',
            'rate' => 'integer',
            'available' => 'boolean'
        ]);

        $params = $request->all();

        $visitrate = $this->visitRateRepository->updateVisitRate($params, $id);

        if(!$visitrate){
            //Find Proper Error Reporting Feature
            $error = 'Please Try Again';
            return $this->sendError('Visit Rate Edit Error', $error);
        }

        //$success['visit_type'] = $params['visit_type'];

        $success = [];

        return $this->sendResponse($success, 'Visit Rate Edited Successfully.');
    }

    public function delete($id)
    {
        $visitrate = $this->visitRateRepository->deleteVisitRate($id);

        if(!$visitrate){
            //Find Proper Error Reporting Feature
            $error = 'Please Try Again';
            return $this->sendError('Visit Rate Delete Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Visit Rate deleted successfully');
    }

}
