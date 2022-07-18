<?php

namespace App\Http\Controllers;

use App\DataTables\Role\RoleDataTable;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(RoleDataTable $dataTable){
        return $dataTable->render('role.index');
    }
}
