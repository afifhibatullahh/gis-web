<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\MenuModel;
use App\Models\PostModel;

class Home extends BaseController
{

    protected $postModel;
    protected $menuModel;
    protected $categoryModel;
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->menuModel = new MenuModel();
        $this->categoryModel = new CategoryModel();
    }
    public function index($param_1 = null, $param_2 = null)
    {
        $map = $this->postModel->select('others')->where('post_type', 'map')->findAll();
        if ($param_1 != null) {
            $category_id = $this->categoryModel->select('category_id')->where('slug', $param_1)->first();
            $map = $this->postModel->select('others')->where('post_type', 'map')->where('category_id', $category_id)->findAll();

            if ($param_2 != null) {
                $map = $this->postModel->select('others')->where('slug', $param_2)->first();
                // dd($map);
            }
        }


        $maps = [];
        $i = 0;
        foreach ($map as $temp) {
            if ($param_2 != null) $maps[] = json_decode($temp);
            else $maps[] = json_decode($temp['others']);
        }
        $data = [
            'map' => ($param_2 == null) ? $maps : $maps[0],
            'menu' => $this->menuModel->orderBy('sort', 'ASC')->findAll(),
            'category' => $this->categoryModel->findAll(),
            'post' => $this->postModel->where('post_type', 'map')->findAll(),
        ];

        if ($param_2 != null) {
            $data['title'] = $this->postModel->select('title')->where('slug', $param_2)->first();
            $data['image'] = $this->postModel->select('image')->where('slug', $param_2)->first();
            // dd($data);
            return view('user/detail', $data);
        }
        // dd($data);
        return view('user/dashboard', $data);
    }
}
