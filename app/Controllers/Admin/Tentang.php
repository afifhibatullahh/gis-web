<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TentangModel;
use CodeIgniter\HTTP\Request;

class Tentang extends BaseController
{
    protected $tentangModel;
    public function __construct()
    {
        $this->tentangModel = new TentangModel();
    }

    public function index()
    {
        return view('admin/tentang/index');
    }

    public function listData()
    {
        $list = $this->tentangModel->getDataTables();

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
        $content = $this->request->getVar('content');
        $status = $this->request->getVar('status');
        $author = $this->request->getVar('author');
        $date_publish = $this->request->getVar('date_publish');

        if ($id == null) {
            $data = [
                'title' => $title,
                'content' => $content,
                'status' => $status,
                'author' => $author,
                'date_publish' => $date_publish
            ];

            $this->tentangModel->save($data);

            return redirect()->to('admin/tentang');
        } else return redirect()->to('admin/tentang');
    }
}
