<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;
class deleteprojetModel extends Model
{
    public function index($id)
    {
        $request = service('request');
        helper(['form','url']);
        $db = Database::connect();
        $data=$request->getPost();
        $aView['row']= $db->table('mesprojets')->where('id',$id)->get()->getRowArray();
        if(!empty($data)){
            $builder = $db->table('mesprojets');
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