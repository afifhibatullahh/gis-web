<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\HTTP\Request;

class Tentang extends BaseController
{
    protected $postModel;
    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {
        return view('admin/tentang/index');
    }

    public function listData()
    {
        $list = $this->postModel->getDataTablesTentang();

        return json_encode($list);
    }
    public function add()
    {

        // $data = [
        //     'title' => $this->request->getVar('title'),
        //     'content' => $this->request->getVar('content'),
        //     'date_publish' => $this->request->getVar('date_publish'),
        //     'status' => $this->request->getVar('status'),
        //     'description' => $this->request->getVar('description') 
        // ]  

        return view('admin/tentang/add');
    }

    public function save($id = null)
    {
        $title = $this->request->getVar('title');
        $slug = url_title($title, '-', true);

        if ($id == null) {
            $data = [
                'title' => $title,
                'slug' => $slug,
                'content' => $this->request->getVar('content'),
                'status' => $this->request->getVar('status'),
                'author' => $this->request->getVar('author'),
                'date_publish' => $this->request->getVar('date_publish'),
                'post_type' => 'profil'
            ];

            $this->postModel->save($data);

            return redirect()->to('admin/tentang');
        } else return redirect()->to('admin/tentang/add');
    }
}
