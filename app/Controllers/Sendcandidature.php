<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use CodeIgniter\HTTP\IncomingRequest;
class Sendcandidature extends Controller
{
    public function index()
    {


        $db = Database::connect();
        $email = Services::email();
        $request = service('request');
        $servermailModel = model('App\models\servermailModel');
        $functionModel = model('App\models\functionModel');
        $config = $servermailModel->index();
        $email->initialize($config);
        $aView['row'] = $db->table('candidature')->get()->getRowArray();
        $aView['liste'] = $db->table('demarcharge')->where('statut2', 0)->get()->getRowArray();


        $email->setHeader('X-Confirm-Reading-To', 's.lefebvre907@laposte.net');
        $email->setHeader('Return-receipt-to', 's.lefebvre907@laposte.net');
        //email destinataire
        $email->setTo($aView['liste']['email']);
        $email->SetFrom("s.lefebvre907@laposte.net", "Lefebvre Harold");
        //$email->AddReplyTo($request->getPost('email'));
        $email->setReplyTo("s.lefebvre907@laposte.net", "Lefebvre Harold");
        $email->setSubject($aView['row']['title']);
        $message = $functionModel->templateEmail($aView['row']['title'], $aView['row']['content']);
        $email->setMessage($message);
        $email->attach('assets/file/cv-developpeurweb.pdf');

        if ($email->send()) {
            $db->table('demarcharge')->set('statut2', 1)->where('id', $aView['liste']['id'])->update();
        } else {
            $db->table('demarcharge')->set('statut2', 2)->where('id', $aView['liste']['id'])->update();
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }

    }
}