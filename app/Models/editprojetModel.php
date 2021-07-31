<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;
class editprojetModel extends Model
{
    public function index($id): array
    {
        $request = service('request');
        $data=$request->getPost();
        helper(['form','url']);
        $db = Database::connect();
        $aView['row']= $db->table('mesprojets')->where('id',$id)->get()->getRowArray();
        $data['contenu']=$request->getPost('contenu');
        $data['contenu']= str_replace('<p><strong>','<strong>',$data['contenu']);
        $data['contenu']= str_replace('</strong></p>','</strong>',$data['contenu']);
        $data['contenu']= str_replace('<p>','',$data['contenu']);
        $data['contenu']= str_replace('</p>','',$data['contenu']);
        $data['contenu'] = str_replace('../../assets','assets',$data['contenu']);
        if(!empty($request->getPost('title'))&&!empty($request->getPost('contenu'))){
            $builder = $db->table('mesprojets');
            $builder->set($data);
            $builder->where('id', $id);
            if($builder->update()){
                $aView['error'] = true;
            }else{
                $aView['error'] = '<div class="alert alert-danger" role="alert">Aucune modification effectué</div>';
            }

        }
        $aView['dump']= $request->getPost();
        return $aView;
    }
}