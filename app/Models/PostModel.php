<?php

namespace App\Models;

use CodeIgniter\Config\Services;
use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'post';

    protected $allowedFields = ['title', 'author', 'description', 'content', 'status', 'slug', 'post_type', 'category_id', 'date_publish', 'date_modify', 'image', 'kecamatan', 'others',];

    public function getDataTablesTentang()
    {
        $lists = $this->where('post_type', 'profil')->findAll();
        $data = [];
        $i = 1;
        foreach ($lists as $list) {
            $row = [];
            $row[] = '';
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
