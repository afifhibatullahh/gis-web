<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Administrator extends BaseController
{
    public function index()
    {
        return view('admin/administrator');
    }
}
