<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class MapSetting extends BaseController
{
    public function index()
    {
        return view('admin/mapSetting');
    }
}
