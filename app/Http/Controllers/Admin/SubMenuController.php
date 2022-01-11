<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\SubMenuContract;
use App\Models\Menu;
use App\Models\SubMenu;

class SubMenuController extends BaseController
{
    protected $subMenuRepository;

    public function __construct(SubMenuContract $subMenuRepository)
    {
        $this->subMenuRepository = $subMenuRepository;
    }

    public function index(){
        $submenu = $this->subMenuRepository->listSubMenu();
        return $this->sendResponse($submenu, 'Sub Menu Fetched.');
    }

    public function menusubmenu($url){
        $menu = Menu::where('url', $url)->first();
        $submenu = SubMenu::where('menu_id', $menu->id)->get();
        return $this->sendResponse($submenu, 'Sub Menu Fetched.');
    }

    public function store(Request $request){

        $this->validate($request, [
            'menu_id' => 'required|integer',
            'name' => 'required|string',
            'slug' => 'required|string',
            'url' => 'required|string',
            'active' => 'required|boolean'
        ]);

        $params = $request->all();

        $submenu = $this->subMenuRepository->createSubMenu($params);

        if(!$submenu){
            $error = 'Please Try Again!';

            return $this->sendError('Sub Menu Creation Error', $error);
        }

        $success['name'] = $params['name'];

        return $this->sendResponse($success, 'Sub Menu Created successfully');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'menu_id' => 'integer',
            'name' => 'string',
            'slug' => 'string',
            'url' => 'string',
            'active' => 'boolean'
        ]);

        $params = $request->all();

        $submenu = $this->subMenuRepository->updateSubMenu($params, $id);

        if(!$submenu){
            $error = 'Please Try Again!';

            return $this->sendError('Sub Menu Edit Error', $error);
        }

        $success['name'] = $params['name'];

        return $this->sendResponse($success, 'Sub Menu edited successfully');
    }

    public function delete($id)
    {
        $submenu = $this->subMenuRepository->deleteSubMenu($id);

        if(!$submenu){
            $error = 'Please Try Again!';

            return $this->sendError('Sub Menu Delete Error', $error);
        }

        $success = [];

        return $this->sendResponse($success, 'Sub Menu Deleted successfully');
    }

}
