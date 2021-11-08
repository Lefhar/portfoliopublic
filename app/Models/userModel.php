<?php


namespace App\Models;


use CodeIgniter\Model;
use Config\Cookie;
use Config\Database;
use Config\Services;

class userModel extends Model
{
    public $_user = array();

    public function __construct()
    {

        $db = Database::connect();
        $session = Services::session();
        if (!empty($_COOKIE['Lh_admin'])) {
            $cookie = explode(":", $_COOKIE['Lh_admin']);
            $session->set(array('login' => $cookie[0], 'jeton' => $cookie[1]));
            //var_dump($_SESSION['login']);
        }
        if (!empty($_SESSION['login']) && !empty($_SESSION['jeton'])) {
            $email = $_SESSION['login'];
            $jeton = $_SESSION['jeton'];
            // $this->_user = $db->table('users')->where('email', $email)->where('jeton', $jeton)->get()->getResult();
            $array = ['email' => $email, 'jeton' => $jeton];
            $this->_user = $db->table('users')->where($array)->get()->getRowArray();

           // var_dump($query);
        }

        // echo $this->_user;
    }

    public function getUser()
    {

        return $this->_user;
    }


    public function inscription(): array
    {
        $db = Database::connect();
        $session = Services::session();
        $request = service('request');
        $email = Services::email();
        $servermailModel = model('App\models\servermailModel');
        $config = $servermailModel->index();
        $email->initialize($config);
        //recupération des données post
        $functionModel = model('App\models\functionModel');
        $salt = $functionModel->salt(12);
        $data['password'] = password_hash($functionModel->password($request->getPost('password'), $salt), PASSWORD_DEFAULT);// on appel la fonction password comme sa on reprend la même méthode d'assemblage du sel et du mot de passe
        $data['date_create'] = date('Y-m-d H:i:s');
        $data['mail_hash'] = md5($functionModel->password($salt, $salt));
        $data['email'] = $request->getPost('email');
        $data['salt'] = $salt;


        $builder = $db->table('users');
        $builder->select('email');
        $builder->where('email', $request->getPost('email'));
        $query = $builder->get();
        $aView["users"] = $query->getResult();
        if (!empty($request->getPost('password')) && !empty($request->getPost('confirpassword')) && $request->getPost('confirpassword') == $request->getPost('password') && empty($aView["users"])) {

            $builder = $db->table('users');
            $builder->set($data);
            $builder->insert();
            $email->SetFrom("s.lefebvre907@laposte.net", "Lefebvre Harold");
            $email->setTo($request->getPost('email'));
            $email->setSubject('Confirmation email');
            $message = $functionModel->templateEmail("Confirmation d'inscription", "<p><a href='" . site_url('/users/validationemail/') . "" . ($data['mail_hash']) . "' > Confirmez votre adresse email</a></p>
                                 si vous ne pouvez pas lire cette email suivez copiez ce lien et coller le dans la barre d'adresse Lien " . site_url('/users/validationemail/') . "" . ($data['mail_hash']) . "");
            $email->setMessage($message);
            $email->send();
            //   redirect('users/inscriptionvalide');

            $aView['error'] = '<div class="alert alert-success" role="alert">Vérifier votre boite email</div>';
        } else {
            $aView['error'] = '<div class="alert alert-danger" role="alert">Une erreur c\'est produite</div>';

        }
        return $aView;
    }

    public function connexion(): array
    {
        helper(['cookie','url','form']);
        $db = Database::connect();
        $session = Services::session();
        $request = service('request');
        $functionModel = model('App\models\functionModel');

        $email = $request->getPost("email");
        $password = $request->getPost('password');

        $aView["users"] = $db->table('users')->where('email', $email)->get()->getRow();

        if (!empty($aView["users"]->email)
            && password_verify($functionModel->password($password, $aView["users"]->salt), $aView["users"]->password)
            && empty($aView["users"]->mail_hash)) {


            $jeton = password_hash($functionModel->salt(12), PASSWORD_DEFAULT);
            $data["date_connect"] = date("Y-m-d H:i:s");
            $data["jeton"] = $jeton;
            $aView["jeton"] = $jeton;
            $builder = $db->table('users');
            $builder->set($data);
            $builder->where('email', $email);
            $builder->update();
            $session->set(array('login' => $email, 'jeton' => $data["jeton"]));
            if(!empty($request->getPost('remember'))&&$request->getPost('remember')=="on"){
            setcookie('Lh_admin', $aView['users']->email . ':' . $data["jeton"], time()+3600*168, '/', '', false, false);
            }
            $aView['valide'] = true;
        } elseif (!empty($aView["users"]->mail_hash)) {
            $aView['error'] = '<div class="alert alert-danger" role="alert">Vous devez valider votre adresse email <a href="' . site_url('users/resendemail') . '">renvoyer</a></div>';

        } else {
            if(!empty($request->getPost())){
            $aView['error'] = '<div class="alert alert-danger" role="alert">Email ou mot de passe faux</div>';
            }
        }

        return $aView;
    }

    /**
     * @param string $token
     * @return array
     */
    public function validationEmail(string $token): array
    {
        $db = Database::connect();
        $req = $db->table('users')->where('mail_hash', $token)->get()->getRowArray();
        if(!empty($req)) {
            $data['mail_hash'] = "";
            $builder = $db->table('users');
            $builder->set($data);
            $builder->where('id', $req['id']);
            $builder->update();
            $aView['error'] = '<div class="alert alert-success" role="alert">Votre email est confirmé vous pouvez  <a href="' . site_url('users/connexion') . '">vous connecter ici</a></div>';
        }else{
            $aView['error'] = '<div class="alert alert-danger" role="alert">Email déjà confirmé ou Lien non valide vous devez valider votre adresse email <a href="' . site_url('users/resendemail') . '">renvoyer</a></div>';
        }
        return $aView;
    }
    public function resendemail(): array
    {
        $aView['error'] = '<div class="alert alert-success" role="alert">Merci si votre email existe dans notre base de donnée un email va vous êtres envoyé</div>';
        $request = service('request');
        $db = Database::connect();
        $email = Services::email();
        $servermailModel = model('App\models\servermailModel');
        $config = $servermailModel->index();
        $email->initialize($config);
        $functionModel = model('App\models\functionModel');
        $req = $db->table('users')->where('email', $request->getPost("email"))->where('mail_hash !=""')->get()->getRowArray();
        if(!empty($req)) {
            $email->SetFrom("s.lefebvre907@laposte.net", "Lefebvre Harold");
            $email->setTo($req['email']);
            $email->setSubject('Confirmation email');
            $message = $functionModel->templateEmail("Confirmation d'inscription", "<p><a href='" . site_url('/users/validationemail/') . "" . ($req['mail_hash']) . "' > Confirmez votre adresse email</a></p>
                                 si vous ne pouvez pas lire cette email suivez copiez ce lien et coller le dans la barre d'adresse Lien " . site_url('/users/validationemail/') . "" . ($req['mail_hash']) . "");
            $email->setMessage($message);
            $email->send();
        }
        return $aView;
    }
}