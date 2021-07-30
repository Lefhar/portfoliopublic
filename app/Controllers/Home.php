<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
        $homeModel = model('App\Models\homeModel');
        $aView = $homeModel->index();
        echo view('template/header');
		echo view('template/index',$aView);
        echo view('template/footer');
	}
}
