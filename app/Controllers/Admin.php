<?php


namespace App\Controllers;


use CodeIgniter\Controller;
use Config\Services;
use Dompdf\Css\Stylesheet;
use Dompdf\Dompdf;

class Admin extends Controller
{
    /**
     * @brief index par défaut de l'administration
     * @return view /template/admin/index.php
     */
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

    /**
     * @brief page de préparation de template de candidature
     * @return view /template/admin/mescandidature.php
     */
    public function mescandidatures()
    {
        $candidatureModel = model('App\Models\candidatureModel');
        $aView = $candidatureModel->index();
        $userModel = model('App\Models\userModel');
        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/mescandidatures', $aView);
        echo view('template/admin/footer');

    }

    /**
     * @brief permet d'ajouter un bloc de template pour les candidatures
     * @return view template/admin/addcandidature
     */
    public function addcandidature()
    {
        $validation = Services::validation();
        $request = service('request');
        $addcandidatureModel = model('App\Models\addcandidatureModel');
        $aView = $addcandidatureModel->index();
        $userModel = model('App\Models\userModel');
        $aViewHeader['user'] = $userModel->getUser();
        $validation->setRule('title', 'title', 'required', array("required" => "le champs titre est obligatoire."));
        $validation->setRule('content', "content", 'required', array("required" => "le champs contenu est obligatoire."));
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/addcandidature', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/mescandidatures');
        }
    }

    /**
     * @brief permet de éditer un bloc de template pour les candidatures
     * @return view template/admin/editcandidature
     */
    public function editcandidature()
    {
        $userModel = model('App\Models\userModel');
        $editcandidatureModel = model('App\Models\editcandidatureModel');
        $request = service('request');
        $aView = $editcandidatureModel->index($request->uri->getSegment(3));
        $validation = Services::validation();

        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        $validation->setRule('title', 'title', 'required|max_length[30]', array("required" => "le champs titre est obligatoire.", "max_length" => "30 caractéres maximum pour le titre"));
        $validation->setRule('content', 'content', 'required', array("required" => "le champs contenu est obligatoire."));
        $data = $request->getPost();

        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';

        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/editcandidature', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/mescandidatures');
        }
    }

    /**
     * @brief permet d'effacer un bloc de template pour les candidatures
     * @return view template/admin/editcandidature
     */
    public function deletecandidature()
    {
        $userModel = model('App\Models\userModel');
        $deletecandidatureModel = model('App\Models\deletecandidatureModel');
        $request = service('request');
        $aViewHeader['user'] = $userModel->getUser();
        $aView = $deletecandidatureModel->index($request->uri->getSegment(3));
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/confirmdelete', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/mescandidatures');
        }
    }

    /**
     * @brief permet d'ajouter une entreprise pour le démarcharge
     * @return view template/admin/addEntreprise
     */
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
        echo view('template/admin/ajout_entreprise', $aView);
        echo view('template/admin/footer');

    }
    /**
     * @brief permet d'ajouter un serveur smtp pour l'envoi d'email
     * @return view template/admin/ajout_serversmtp
     */
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
        echo view('template/admin/ajout_serversmtp', $aView);
        echo view('template/admin/footer');
    }

    /**
     * @brief permet d'afficher mes projets visible sur l'accueil
     * @return view template/admin/mesprojets
     */
    public function mesprojets()
    {
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
        echo view('template/admin/mesprojets', $aView);
        echo view('template/admin/footer');

    }
    /**
     * @brief permet d'ajouter un bloc de de projet visible sur l'accueil
     * @return view template/admin/addprojet
     */
    public function addprojet()
    {
        $userModel = model('App\Models\userModel');
        $addprojetModel = model('App\Models\addprojetModel');
        $request = service('request');
        $aView = $addprojetModel->index();
        $validation = Services::validation();

        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }

        $validation->setRule('title', 'title', 'required|max_length[30]', array("required" => "le champs titre est obligatoire.", "max_length" => "30 caractéres maximum pour le titre"));
        $validation->setRule('contenu', 'contenu', 'required', array("required" => "le champs contenu est obligatoire."));
        $data = $request->getPost();

        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';

        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/addprojet', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/mesprojets');
        }
    }

    /**
     * @brief permet d'éditer un bloc de de projet visible sur l'accueil
     * @return view template/admin/editprojet
     */
    public function editprojet()
    {
        $userModel = model('App\Models\userModel');
        $editprojetModel = model('App\Models\editprojetModel');
        $request = service('request');
        $aView = $editprojetModel->index($request->uri->getSegment(3));
        $validation = Services::validation();

        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        $validation->setRule('title', 'title', 'required|max_length[30]', array("required" => "le champs titre est obligatoire.", "max_length" => "30 caractéres maximum pour le titre"));
        $validation->setRule('contenu', 'contenu', 'required', array("required" => "le champs contenu est obligatoire."));
        $data = $request->getPost();

        if ($validation->run($data) != TRUE && $request->getPost()) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';

        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/editprojet', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/mesprojets');
        }
    }
    /**
     * @brief permet d'éffacer un bloc de de projet visible sur l'accueil
     * @return view template/admin/confirmdelete
     */
    public function deleteprojet()
    {
        $userModel = model('App\Models\userModel');
        $deleteProjet = model('App\Models\deleteprojetModel');
        $request = service('request');
        $aViewHeader['user'] = $userModel->getUser();
        $aView = $deleteProjet->index($request->uri->getSegment(3));
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/confirmdelete', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/moncv');
        }
    }

    /**
     * @brief permet d'afficher mon cv visible sur l'accueil
     * @return view template/admin/moncv
     */
    public function moncv()
    {
        $homeModel = model('App\Models\homeModel');
        $userModel = model('App\Models\userModel');
        $aView = $homeModel->monCv();
        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/moncv', $aView);
        echo view('template/admin/footer');

    }
    /**
     * @brief permet d'ajouter mon cv visible sur l'accueil
     * @return view template/admin/addcv
     */
    public function addcv()
    {
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
        echo view('template/admin/addcv', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/moncv');
        }
    }

    /**
     * @brief permet d'éditer mon cv visible sur l'accueil
     * @return view template/admin/editcv
     */
    public function editcv()
    {
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
        echo view('template/admin/editcv', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/moncv');
        }

    }
    /**
     * @brief permet d'effacer mon cv visible sur l'accueil
     * @return view template/admin/confirmdelete
     */
    public function deletebloccv()
    {
        $userModel = model('App\Models\userModel');
        $deletebloccvModel = model('App\Models\deletebloccvModel');
        $request = service('request');
        $aViewHeader['user'] = $userModel->getUser();
        $aView = $deletebloccvModel->index($request->uri->getSegment(3));
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/confirmdelete', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/moncv');
        }
    }

    /**
     * @brief permet d'ajouter mon bloc sociaux ou profil visible sur l'accueil
     * @return view template/admin/addpicture
     */
    public function addpicture()
    {
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
        echo view('template/admin/addpicture', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/moncv');
        }
    }

    /**
     * @brief permet d'éditer mon bloc sociaux ou profil visible sur l'accueil
     * @return view template/admin/editpicture
     */
    public function editpicture()
    {
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
        echo view('template/admin/editpicture', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/moncv');
        }

    }

    /**
     * @brief permet d'éffacer mon bloc sociaux ou profil visible sur l'accueil
     * @return view template/admin/confirmdelete
     */
    public function deleteblocpicture()
    {
        $userModel = model('App\Models\userModel');
        $deletebloccvModel = model('App\Models\deletebloccvModel');
        $request = service('request');
        $aViewHeader['user'] = $userModel->getUser();
        $aView = $deletebloccvModel->picture($request->uri->getSegment(3));
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        echo view('template/admin/header', $aViewHeader);
        echo view('template/admin/sidebar');
        echo view('template/admin/confirmdelete', $aView);
        echo view('template/admin/footer');
        if (!empty($aView['error']) && $aView['error'] == true) {
            return redirect()->to('admin/moncv');
        }
    }

}
