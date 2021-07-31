<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;
class deletebloccvModel extends Model
{
    public function index($id)
    {
        $request = service('request');
        helper(['form','url']);
        $db = Database::connect();
        $data=$request->getPost();
        $aView['row']= $db->table('contenu_cv')->where('id',$id)->get()->getRowArray();
        if(!empty($data)){
            $builder = $db->table('contenu_cv');
            $builder->where('id', $data['id']);
            if($builder->delete()){
                $aView['error'] = true;
            }else{
                $aView['error'] = '<div class="alert alert-danger" role="alert">Erreur d\'éffacement</div>';
            }
        }
        return $aView;
    }
    public function picture($id)
    {
        $request = service('request');
        helper(['form','url']);
        $db = Database::connect();
        $data=$request->getPost();
        $aView['row']= $db->table('image')->where('id',$id)->get()->getRowArray();
        if(!empty($data)){
            $builder = $db->table('image');
            $builder->where('id', $data['id']);
            if($builder->delete()){
                $aView['error'] = true;
            }else{
                $aView['error'] = '<div class="alert alert-danger" role="alert">Erreur d\'éffacement</div>';
            }
        }
        return $aView;
    }

}