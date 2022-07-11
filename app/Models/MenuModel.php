<?php

namespace App\Models;

use CodeIgniter\Config\Services;
use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table      = 'menu';
    protected $primaryKey = 'menu_id';

    protected $allowedFields = ['menu_type', 'sort', 'icon', 'title', 'url', 'target'];
}
