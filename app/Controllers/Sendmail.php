<?php


namespace App\Controllers;

use CodeIgniter\Model;
use Config\Services;
use CodeIgniter\HTTP\IncomingRequest;

class Sendmail extends BaseController
{


    public function index()
    {
//        $viewModel = new SendEmail();
//        $aView = $viewModel->sendcv();
//        echo view('template/viewsendemail',$aView);

        $request = service('request');

        $email = Services::email();
        $servermailModel = model('App\models\servermailModel');
        $config = $servermailModel->index();
        $email->initialize($config);
        helper(['form', 'reCaptcha']);
        $validation = Services::validation();
        $data = $request->getPost();
        $validation->setRule('reCaptcha2', 'Captcha', 'required|reCaptcha2[]', array("required" => "Captcha est obligatoire.", "reCaptcha2" => "Le Captcha n'a pas été correctement rempli"));
        $validation->setRule('email', 'Email', 'required|valid_email', array("required" => "le %s est obligatoire.", "valid_email" => "Veuillez entrer une adresse Email correct"));
        $validation->setRule('sujet', 'Sujet', 'required', array("required" => "le Sujet est obligatoire."));
        if ($request->getPost('sujet') != "cv") {
            $validation->setRule('message', 'Message', 'required', array("required" => "Veuillez remplir correctement le champs Message."));
        }


        if ($validation->run($data) == TRUE) {
            if ($request->getPost('sujet') == "cv") {
                $email->setTo($request->getPost('email'));
                $email->SetFrom("s.lefebvre907@laposte.net", "Lefebvre Harold");
                $email->setHeader('X-Confirm-Reading-To', 's.lefebvre907@laposte.net');
                $email->setHeader('Return-receipt-to', 's.lefebvre907@laposte.net');

                $email->setSubject("Demande de CV");
                $email->setMessage(file_get_contents("assets/file/template1.html"));
                $email->attach('assets/file/cv-developpeurweb.pdf');


            } else {
                $email->setHeader('X-Confirm-Reading-To', 's.lefebvre907@laposte.net');
                $email->setHeader('Return-receipt-to', 's.lefebvre907@laposte.net');
                $email->setTo('s.lefebvre907@laposte.net');
                $email->SetFrom("s.lefebvre907@laposte.net", "Lefebvre Harold");
                //$email->AddReplyTo($request->getPost('email'));
                $email->setReplyTo($request->getPost('email'));
                $email->setSubject($request->getPost('sujet'));
                $email->setMessage($request->getPost('message'));
            }

            if ($email->send()) {
                echo '<div class="alert alert-success" role="alert">
                         message envoyé!
                       </div><script>document.getElementById("contactme").style.display = "none";</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                            une erreur c\'est produite
                          </div>';
            $data = $email->printDebugger(['headers']);
           print_r($data);
            }
        } else {

            echo '<div class="alert alert-danger" role="alert">
                          ' . $validation->listErrors() . '
                          </div>';
        }
    }
}