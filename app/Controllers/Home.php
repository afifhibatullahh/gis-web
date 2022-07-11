<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{

    protected $postModel;
    public function __construct()
    {
        $this->postModel = new PostModel();
    }
    public function index()
    {
        $map = $this->postModel->select('others')->where('post_type', 'map')->findAll();

        $maps = [];
        $i = 0;
        foreach ($map as $temp) {
            $maps[] = json_decode($temp['others']);
        }
        $data = [
            'map' => $maps
        ];
        // dd($data['map'][0]->address);
        return view('user/dashboard', $data);
    }
}
