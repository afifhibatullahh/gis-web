<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class PopupManager extends BaseController
{
    public function index()
    {
        return view('admin/popupManager');
    }
}
