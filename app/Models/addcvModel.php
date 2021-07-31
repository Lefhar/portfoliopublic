<?php


namespace App\Models;


use CodeIgniter\Model;
use Config\Database;

class addcvModel extends Model
{
    public function index(): array
    {
        $aView['error']='';
        $request = service('request');
        $data=$request->getPost();
        helper(['form','url']);
        $db = Database::connect();
        $data['content']=$request->getPost('content');
        $data['content']= str_replace('<p><strong>','<strong>',$data['content']);
        $data['content']= str_replace('</strong></p>','</strong>',$data['content']);
        $data['content'] = str_replace('../../assets','assets',$data['content']);
        if(!empty($request->getPost('title'))&&!empty($request->getPost('content'))){
            $builder = $db->table('contenu_cv');
            $builder->set($data);
            $builder->insert();
            $aView['error'] = '<div class="alert alert-success" role="alert">Ajout effectué</div>';
        }

        return $aView;
    }
    public function picture(): array
    {
        $aView['error']='';
        $request = service('request');
        $data=$request->getPost();
        helper(['form','url']);
        $db = Database::connect();
        $data['content']=$request->getPost('content');
        $data['content']= str_replace('<p>','',$data['content']);
        $data['content']= str_replace('</p>','',$data['content']);
        $data['content'] = str_replace('../../assets','assets',$data['content']);

        if(!empty($request->getPost('emplacement'))&&!empty($request->getPost('content'))){
            $builder = $db->table('image');
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