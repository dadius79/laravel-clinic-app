<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\AdminContract;
use App\Models\Admin;

class AdminController extends BaseController
{
    public function __construct(AdminContract $adminRepository){
        $this->adminRepository = $adminRepository;
    }

    public function index(){
        $admins = DB::table('admins')
            ->join('admin_roles', 'admins.admin_role', '=', 'admin_roles.id')
            ->select('admins.*', 'admin_roles.role')
            ->orderBy('role', 'asc')
            ->get(['*']);
        return $this->sendResponse($admins, 'Adminstrators Fetched Successfully.');
    }

    public function list($id){
        $admins = DB::table('admins')
            ->join('admin_roles', 'admins.admin_role', '=', 'admin_roles.id')
            ->select('admins.*', 'admin_roles.role')
            ->where('admin_role', $id)
            ->orderBy('role', 'asc')
            ->get(['*']);
        return $this->sendResponse($admins, 'Adminstrators Fetched Successfully.');
    }
}
