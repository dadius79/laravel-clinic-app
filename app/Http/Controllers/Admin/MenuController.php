<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\MenuContract;

class MenuController extends BaseController
{
    protected $menuRepository;

    public function __construct(MenuContract $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function index()
    {
        $menu = $this->menuRepository->listMenu();
        return $this->sendResponse($menu, 'Menu Fetched.');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'slug' => 'required|string',
            'url' => 'required|string',
            'active' => 'required|boolean'
        ]);

        $params = $request->all();

        $menu = $this->menuRepository->createMenu($params);

        if(!$menu){
            //Extract and provide error
            $error = 'Please Try Again';
            //return $this->sendError('Menu Creation Error', $validator->errors());
            return $this->sendError('Menu Creation Error', $error);
        }

        $success['name'] = $params['name'];

        return $this->sendResponse($success, 'Menu created successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'string',
            'slug' => 'string',
            'url' => 'string',
            'active' => 'boolean'
        ]);

        $params = $request->all();

        $menu = $this->menuRepository->updateMenu($params, $id);

        if(!$menu){
            //Extract and provide error
            $error = 'Please Try Again';
            //return $this->sendError('Menu Creation Error', $validator->errors());
            return $this->sendError('Menu Edit Error', $error);
        }

        $success['name'] = $params['name'];

        return $this->sendResponse($success, 'Menu edited successfully.');
    }

    public function delete($id)
    {
        $menu = $this->menuRepository->deleteMenu($id);

        if(!$menu){
            //Extract and provide error
            $error = 'Please Try Again';
            //return $this->sendError('Menu Creation Error', $validator->errors());
            return $this->sendError('Menu Delete Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Menu deleted successfully.');
    }
}
