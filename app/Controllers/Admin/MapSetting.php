<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\PostModel;
use CodeIgniter\HTTP\Request;

class MapSetting extends BaseController
{
    protected $postModel;
    protected $categoryModel;
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $list = $this->postModel->where('post_type', 'map')->findAll();
        $category = [];
        $i = 0;
        foreach ($list as $data) {
            $temp = $this->categoryModel->find($data['category_id']);
            $category[] = $temp['title'];
            $i++;
        }
        $data = [
            'map' => $list,
            'category' => $category
        ];
        return view('admin/map/index', $data);
    }

    public function listData()
    {
        $list = $this->postModel->where('post_type', 'map')->findAll();

        return json_encode($list);
    }

    public function add()
    {
        session();
        $data = [
            'category' => $this->categoryModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/map/add', $data);
    }

    public function save($param = null)
    {
        if (!$this->validate([
            'title' => 'required',
            'cover' => 'is_image[cover]',
        ])) {
            // ...
            $validation = \Config\Services::validation();
            if ($param == null)  return redirect()->to('/admin/maps/add')->withInput()->with('validation', $validation);
            else return redirect()->to('/admin/maps/edit')->withInput()->with('validation', $validation);
        }

        $title = $this->request->getVar('title');
        $slug = url_title($title, '-', true);

        $image = $this->request->getFile('cover');
        $imageName = $image->getName();
        if ($imageName != 'poster.jpg') {
            $imageName = $image->getRandomName();
            $image->move('img', $imageName);
        }

        $others = [
            'latitude' => $this->request->getVar('latitude'),
            'longtitude' => $this->request->getVar('longtitude'),
            'description' => $this->request->getVar('description'),
            'address' => $this->request->getVar('kecamatan')
        ];

        if ($param == null) {

            $data = [
                'title' => $title,
                'slug' => $slug,
                'content' => $this->request->getVar('content'),
                'status' => $this->request->getVar('status'),
                'author' => $this->request->getVar('author'),
                'date_create' => date('Y-m-d H:i:s'),
                'date_publish' => $this->request->getVar('date_publish'),
                'post_type' => 'map',
                'kecamatan' => $this->request->getVar('kecamatan'),
                'others' => json_encode($others),
                'image' => $imageName,
                'category_id' => $this->request->getPost('category_id'),
            ];

            // dd($data);
            $this->postModel->save($data);
            return redirect()->to('admin/map');
        } else {
            $id = $this->postModel->select('id')->where('slug', $param);
            $data = [
                'id' => $id,
                'title' => $title,
                'slug' => $slug,
                'content' => $this->request->getVar('content'),
                'status' => $this->request->getVar('status'),
                'author' => $this->request->getVar('author'),
                'date_create' => date('Y-m-d H:i:s'),
                'date_publish' => $this->request->getVar('date_publish'),
                'post_type' => 'map',
                'kecamatan' => $this->request->getVar('kecamatan'),
                'others' => json_encode($others),
                'image' => $imageName,
                'category_id' => $this->request->getPost('category_id'),
            ];

            // dd($data);
            $this->postModel->save($data);
            return redirect()->to('admin/map');
        };
    }
}
