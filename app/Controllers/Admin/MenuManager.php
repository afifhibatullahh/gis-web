<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;

class MenuManager extends BaseController
{
    protected $menuModel;
    public function __construct()
    {
        $this->menuModel = new MenuModel();
    }
    public function index()
    {
        // $menu = $this->menuModel->orderBy('sort', 'ASC')
        $data = [
            'menu' => $this->menuModel->orderBy('sort', 'ASC')->findAll()
        ];
        return view('admin/menu/index', $data);
    }
    public function save()
    {
        $json = $this->request->getVar('menu');
        if ($json != null) {
            $menu = json_decode($json);
            $i = 1;
            foreach ($menu as $data) {
                $val = ['sort' => $i++];
                $this->menuModel->update($data->id, $val);
            }
            return redirect()->to('/admin/menu/');
        }

        $data = [
            'menu_type' => 'main-menu',
            'sort' => $this->menuModel->countAllResults() + 1,
            'title' => $this->request->getVar('title'),
            'url' => $this->request->getVar('url'),
            'target' => $this->request->getVar('target'),
        ];
        $this->menuModel->insert($data);
        return redirect()->to('/admin/menu/');
    }

    public function edit($id)
    {
        $menu = $this->menuModel->find($id);
        $data = [
            'title' => $menu['title'],
            'url' => $menu['url'],
            'target' => $menu['target'],
            'menu' => $this->menuModel->orderBy('sort', 'ASC')->findAll()
        ];

        return view('/admin/menu/edit', $data);
    }

    public function delete($id)
    {
        $this->menuModel->delete($id);
    }
}
