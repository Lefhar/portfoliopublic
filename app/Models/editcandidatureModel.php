<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;
class editcandidatureModel extends Model
{
    public function index($id): array
    {
        $request = service('request');
        $data=$request->getPost();
        helper(['form','url']);
        $db = Database::connect();
        $aView['row']= $db->table('candidature')->where('id',$id)->get()->getRowArray();
        $data['content']=$request->getPost('content');
        $data['content'] = str_replace('../../assets','assets',$data['content']);
        if(!empty($request->getPost('title'))&&!empty($request->getPost('content'))){
            $builder = $db->table('candidature');
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