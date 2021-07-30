<?php


namespace App\Controllers;


use CodeIgniter\Controller;
use Config\Services;

class Fileupload extends Controller
{
    public function upload() {
        helper(['form', 'url']);
        $userModel = model('App\Models\userModel');
        $aViewHeader['user'] = $userModel->getUser();
        if (empty($aViewHeader['user']) or $aViewHeader['user']['role'] != 1) {
            return redirect()->to('users/connexion');
        }
        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png,image/gif,image/webp]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {
            echo json_encode(array('error file not accept'));
        } else {
            $img = $this->request->getFile('file');
            //Services::image()->withFile($img)->resize(100, 100, true, 'height')->save('assets/file/'. $img->getName());
//http://portfolio.fr/assets/img/jarditou_ci-min2-min.webp
          //  $img->move('assets/file');

//            $img = $this->request->getFile('file');
            $img->move('assets/file');
            echo json_encode(array('location'=>'assets/file/'.$img->getName()));
          //  var_dump($img);

        }
    }

}