<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;
use Config\Database;
use CodeIgniter\HTTP\Response;

class scriptindex extends Controller
{
    public function index()
    {
        $response = service('response');
        $projetsModel = model('App\Models\projetsModel');
        $aView = $projetsModel->index();
        $response->setStatusCode(Response::HTTP_OK);
        //$response->setBody($output);
        $response->setHeader('Content-type', 'application/javascript');
        $response->noCache();

// Sends the output to the browser
// This is typically handled by the framework
        $response->send();
       echo view('template/scriptjs',$aView);
    }
}