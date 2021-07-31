<?php


namespace App\Models;


use CodeIgniter\Model;
use Config\Database;

class addprojetModel extends Model
{
    public function index(): array
    {
        $aView['error']='';
        $request = service('request');
        $data=$request->getPost();
        helper(['form','url']);
        $db = Database::connect();
        $data['contenu']=$request->getPost('contenu');
        $data['contenu']= str_replace('<p><strong>','<strong>',$data['contenu']);
        $data['contenu']= str_replace('</strong></p>','</strong>',$data['contenu']);
        $data['contenu']= str_replace('<p>','',$data['contenu']);
        $data['contenu']= str_replace('</p>','',$data['contenu']);
        $data['contenu'] = str_replace('../../assets','assets',$data['contenu']);
        if(!empty($request->getPost('title'))&&!empty($request->getPost('contenu'))){
            $builder = $db->table('mesprojets');
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