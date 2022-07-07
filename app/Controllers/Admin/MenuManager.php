<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class MenuManager extends BaseController
{
    public function index()
    {
        return view('admin/menuManager');
    }
}
