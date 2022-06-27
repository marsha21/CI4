<?php

namespace App\Controllers;

use App\Models\PortoModel;

class Home extends BaseController
{

    public function index()
    {
        $Porto = new PortoModel();
        $data = [
            'title' => 'uas',
            'page'  => 'tempalate',
            'edu' => $Porto->getEdu(),
            'exp' => $Porto->getExp()
        ];
        return view('template', $data);
    }

    // protected $PortoModel;
    // public function __construct()
    // {
    //     $this->PortoModel = new PortoModel();
    // }

    // public function index()
    // {
    //     $Porto = $this->PortoModel->findAll(); //terdapat record tb_edu

    //     $data = [
    //         'title' => 'CV | Belajar CI4',
    //         'page'  => 'home',
    //         'porto' => $Porto
    //     ];
    //     return view('home', $data);
    // }
}
