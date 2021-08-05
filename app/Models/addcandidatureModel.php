<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;
class addcandidatureModel extends Model
{
    public function index(): array
    {
        $aView['error']='';
        $request = service('request');
        $data=$request->getPost();
        helper(['form','url']);
        $db = Database::connect();
        $data['content']=$request->getPost('content');
//        $data['content']= str_replace('<p><strong>','<strong>',$data['content']);
//        $data['content']= str_replace('</strong></p>','</strong>',$data['content']);
//        $data['content'] = str_replace('../../assets','assets',$data['content']);
        if(!empty($request->getPost('title'))&&!empty($request->getPost('content'))){
            $builder = $db->table('candidature');
            $builder->set($data);
            if($builder->insert()){
                $aView['error'] = true;
            }else{
                $aView['error'] = '<div class="alert alert-danger" role="alert">Erreur d\'ajout</div>';
            }
        }

        return $aView;
    }
}