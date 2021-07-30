<?php


namespace App\Controllers;


use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;
use Config\Services;

class Users extends Controller
{
    public function login()
    {
        echo view('template/admin/header');
        echo view('template/admin/login');
        echo view('template/admin/footer');
    }

    public function inscription()
    {
        $validation = Services::validation();
        $request = service('request');
        $validation->setRule('email', 'Email', 'required|valid_email', array("required" => "le champs email est obligatoire.", "valid_email" => "Veuillez entrer une adresse Email correct"));
        $validation->setRule('password', 'Password', 'required', array("required" => "le mot de passe est obligatoire."));
        $validation->setRule('confirpassword', 'confirpassword', 'required|matches[password]', array("required" => "le champs confirmation du mot de passe est obligatoire.", "matches" => "les deux mot de passe ne correspondre pas"));
        $userModel = model('App\Models\userModel');
        $data = $request->getPost();

        $aView = $userModel->inscription();
        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';
        }
        echo view('template/admin/header');
        if ($request->getPost()) {
            echo view('template/admin/signup', $aView);
        } else {
            echo view('template/admin/signup');
        }
        echo view('template/admin/footer');
    }

    /**
     * @return RedirectResponse
     */
    public function connexion()
    {
        helper(['cookie', 'form', 'url']);
        $validation = Services::validation();
        $request = service('request');
        $validation->setRule('email', 'Email', 'required|valid_email', array("required" => "le champs email est obligatoire.", "valid_email" => "Veuillez entrer une adresse Email correct"));
        $validation->setRule('password', 'Password', 'required', array("required" => "le mot de passe est obligatoire."));
        $userModel = model('App\Models\userModel');
        $data = $request->getPost();

        $aView = $userModel->connexion();
        if ($validation->run($data) != TRUE&&$request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';

        }

        echo view('template/admin/header');


        echo view('template/admin/login', $aView);


        echo view('template/admin/footer');
        if (!empty($aView['valide'])) {
            return redirect()->to('admin');
        }
    }

    public function validationemail()
    {
        $request = service('request');
        $userModel = model('App\Models\userModel');
        $aViewuser = $userModel->getUser();
        if (!empty($aViewuser)) {
            return redirect()->to('admin');
        }

        $aView = $userModel->validationEmail($request->uri->getSegment(3));
        echo view('template/admin/header');


        echo view('template/admin/validationemail', $aView);


        echo view('template/admin/footer');

    }
    public function resendemail()
    {
        helper(['cookie', 'form', 'url']);
        $userModel = model('App\Models\userModel');

        $aView = $userModel->resendemail();
        $aViewuser = $userModel->getUser();
        if (!empty($aViewuser)) {
            return redirect()->to('admin');
        }
        $validation = Services::validation();
        $request = service('request');
        $data = $request->getPost();
        $validation->setRule('email', 'Email', 'required|valid_email', array("required" => "le champs email est obligatoire.", "valid_email" => "Veuillez entrer une adresse Email correct"));
        if ($validation->run($data) != TRUE&&$request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';
        }
        echo view('template/admin/header');


        echo view('template/admin/resendemail', $aView);


        echo view('template/admin/footer');
    }

}