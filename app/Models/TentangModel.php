<?php

namespace App\Models;

use CodeIgniter\Config\Services;
use CodeIgniter\Model;

class TentangModel extends Model
{
    protected $table      = 'tentang';
    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'author', 'description', 'content', 'status'];

    protected $useTimestamps = true;


    public function getDataTables()
    {
        $lists = $this->findAll();
        $data = [];

        foreach ($lists as $list) {
            $row = [];
            $row[] = $list['id'];
            $row[] = "<p> action </p?";
            $row[] = $list['title'];
            $row[] = $list['author'];
            $row[] = $list['date_publish'];
            $row[] = $list['status'];
            $data[] = $row;
        }

        $listData = [
            'data' => $data
        ];

        return $listData;
    }
}
