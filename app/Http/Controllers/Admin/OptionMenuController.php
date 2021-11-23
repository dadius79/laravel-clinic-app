<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\OptionMenuContract;

class OptionMenuController extends BaseController
{
    protected $optionMenuRepository;

    public function __construct(OptionMenuContract $optionMenuRepository){
        $this->optionMenuRepository = $optionMenuRepository;
    }

    public function index(){
        $optionmenu = $this->optionMenuRepository->listOptionMenu();
        return $this->sendResponse($optionmenu, 'Option Menu Fetched.');
    }

    public function store(Request $request){

        $this->validate($request, [
            'sub_menu_id' => 'required|integer',
            'name' => 'required|string',
            'slug' => 'required|string',
            'url' => 'required|string'
        ]);

        $params = $request->all();

        $optionmenu = $this->optionMenuRepository->createOptionMenu($params);

        if(!$optionmenu){
            $error = 'Please Try Again!';

            return $this->sendError('Option Menu Creation Error', $error);
        }

        $success['name'] = $params['name'];

        return $this->sendResponse($success, 'Option Menu Created successfully');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sub_menu_id' => 'integer',
            'name' => 'string',
            'slug' => 'string',
            'url' => 'string'
        ]);

        $params = $request->all();

        $optionmenu = $this->optionMenuRepository->updateOptionMenu($params, $id);

        if(!$optionmenu){
            $error = 'Please Try Again!';

            return $this->sendError('Option Menu Edit Error', $error);
        }

        $success['name'] = $params['name'];

        return $this->sendResponse($success, 'Option Menu Edited Successfully');
    }

    public function delete($id)
    {
        $optionmenu = $this->optionMenuRepository->deleteOptionMenu($id);

        if(!$optionmenu){
            $error = 'Please Try Again!';

            return $this->sendError('Option Menu Delete Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Option Menu Deleted successfully');
    }
}
