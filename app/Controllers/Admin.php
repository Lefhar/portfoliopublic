<?php


namespace App\Controllers;


use CodeIgniter\Controller;
use Config\Services;
use Dompdf\Css\Stylesheet;
use Dompdf\Dompdf;

class Admin extends Controller
{
    public function index()
    {
        $userModel = model('App\Models\userModel');
        $adminModel = model('App\Models\adminModel');
        $aViewHeader['user'] = $userModel->getUser();
        $aView = $adminModel->index();

        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }

        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/index', $aView);
        echo view('template/admin/footer');
    }

    public function ajout_entreprise()
    {
        $validation = Services::validation();
        $request = service('request');
        $userModel = model('App\Models\userModel');
        $addEntreprise = model('App\Models\addEntreprise');
        $aView = $addEntreprise->index();
        $validation->setRule('email', 'Email', 'required|valid_email', array("required" => "le champs email est obligatoire.", "valid_email" => "Veuillez entrer une adresse Email correct"));
        $validation->setRule('nom', "nom d'entreprise obligatoire", 'required', array("required" => "le nom d'entreprise est obligatoire."));
        $data = $request->getPost();
        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';
        }
        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        if (!empty($request->getPost()) && empty($aView['error'])) {
            return redirect()->to('admin');
        }
       //var_dump($aView);
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/ajout_entreprise',$aView);
        echo view('template/admin/footer');
    }
    public function ajout_serversmtp()
    {
        $validation = Services::validation();
        $request = service('request');
        $userModel = model('App\Models\userModel');
        $addEntreprise = model('App\Models\addEntreprise');
        $aView = $addEntreprise->index();
        $validation->setRule('email', 'Email', 'required|valid_email', array("required" => "le champs email est obligatoire.", "valid_email" => "Veuillez entrer une adresse Email correct"));
        $validation->setRule('nom', "nom d'entreprise obligatoire", 'required', array("required" => "le nom d'entreprise est obligatoire."));
        $data = $request->getPost();
        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';
        }
        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        if (!empty($request->getPost()) && empty($aView['error'])) {
            return redirect()->to('admin');
        }
       //var_dump($aView);
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/ajout_serversmtp',$aView);
        echo view('template/admin/footer');
    }

    public function mesprojets(){
        $projetsModel = model('App\Models\projetsModel');
        $aView = $projetsModel->index();
        $userModel = model('App\Models\userModel');
        $aView = $projetsModel->index();
        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/mesprojets',$aView);
        echo view('template/admin/footer');
//        $dompdf = new PdfController();
//        $dompdf->htmlToPDFsave();
    }

    public  function addprojet(){
        $userModel = model('App\Models\userModel');
        $addprojetModel = model('App\Models\addprojetModel');
        $request = service('request');
        $aView = $addprojetModel->index();
        $validation = Services::validation();

        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
     //   $validation->setRule('name', 'name', 'required|max_length[20]', array("required" => "le champs titre est obligatoire.", "max_length" => "20 caractéres maximum pour le champ name"));
         $validation->setRule('title', 'title', 'required|max_length[30]', array("required" => "le champs titre est obligatoire.", "max_length" => "30 caractéres maximum pour le titre"));
        $validation->setRule('contenu', 'contenu', 'required', array("required" => "le champs contenu est obligatoire."));
        $data = $request->getPost();

        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';

        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/addprojet',$aView);
        echo view('template/admin/footer');
    }

    public  function editprojet(){
        $userModel = model('App\Models\userModel');
        $editprojetModel = model('App\Models\editprojetModel');
        $request = service('request');
        $aView = $editprojetModel->index($request->uri->getSegment(3));
        $validation = Services::validation();

        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
     //   $validation->setRule('name', 'name', 'required|max_length[20]', array("required" => "le champs titre est obligatoire.", "max_length" => "20 caractéres maximum pour le champ name"));
         $validation->setRule('title', 'title', 'required|max_length[30]', array("required" => "le champs titre est obligatoire.", "max_length" => "30 caractéres maximum pour le titre"));
        $validation->setRule('contenu', 'contenu', 'required', array("required" => "le champs contenu est obligatoire."));
        $data = $request->getPost();

        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';

        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/editprojet',$aView);
        echo view('template/admin/footer');
    }
    public function moncv(){
        $homeModel = model('App\Models\homeModel');
        $userModel = model('App\Models\userModel');
        $aView = $homeModel->monCv();
        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/moncv',$aView);
        echo view('template/admin/footer');
//        $dompdf = new PdfController();
//        $dompdf->htmlToPDFsave();
    }
    public  function editcv(){
        $userModel = model('App\Models\userModel');
        $editModel = model('App\Models\editcvModel');
        $request = service('request');
        $aView = $editModel->index($request->uri->getSegment(3));
        $validation = Services::validation();

        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        $validation->setRule('title', 'title', 'required|max_length[52]', array("required" => "le champs titre est obligatoire.", "max_length" => "52 caractéres maximum pour le titre"));
       $validation->setRule('content', 'title', 'required', array("required" => "le champs contenu est obligatoire."));
        $data = $request->getPost();

        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';

        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/editcv',$aView);
        echo view('template/admin/footer');

    }

    public  function editpicture(){
        $userModel = model('App\Models\userModel');
        $editModel = model('App\Models\editcvModel');
        $request = service('request');
        $aView = $editModel->picture($request->uri->getSegment(3));
        $validation = Services::validation();

        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        $validation->setRule('content', 'content', 'required', array("required" => "le champs contenu est obligatoire."));
        $data = $request->getPost();

        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';

        }

        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/editpicture',$aView);
        echo view('template/admin/footer');

    }

    public  function addcv(){
        $userModel = model('App\Models\userModel');
        $addcvModel = model('App\Models\addcvModel');
        $request = service('request');
        $aView = $addcvModel->index();
        $validation = Services::validation();

        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        $validation->setRule('title', 'title', 'required|max_length[52]', array("required" => "le champs titre est obligatoire.", "max_length" => "52 caractéres maximum pour le titre"));
        $validation->setRule('content', 'title', 'required', array("required" => "le champs contenu est obligatoire."));
        $data = $request->getPost();

        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';

        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/addcv',$aView);
        echo view('template/admin/footer');
    }

    public  function addpicture(){
        $userModel = model('App\Models\userModel');
        $addcvModel = model('App\Models\addcvModel');
        $request = service('request');
        $aView = $addcvModel->picture();
        $validation = Services::validation();

        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        $validation->setRule('content', 'content', 'required', array("required" => "le champs contenu est obligatoire."));
        $data = $request->getPost();

        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';

        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/addpicture',$aView);
        echo view('template/admin/footer');
    }
}
