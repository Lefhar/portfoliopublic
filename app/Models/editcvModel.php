<?php


namespace App\Models;


use CodeIgniter\Model;
use Config\Database;

class editcvModel extends Model
{
    public function index($id): array
    {
        $request = service('request');
        $data=$request->getPost();
        helper(['form','url']);
        $db = Database::connect();
        $builder = $db->table('contenu_cv');
        $builder->select('*');
        $builder->where('id',$id);
        $query = $builder->get();
        $data['content']=$request->getPost('content');
        $data['content']= str_replace('<p><strong>','<strong>',$data['content']);
        $data['content']= str_replace('</strong></p>','</strong>',$data['content']);
        $data['content'] = str_replace('../../assets','assets',$data['content']);
        if(!empty($request->getPost('title'))&&!empty($request->getPost('content'))){
            $builder = $db->table('contenu_cv');
            $builder->set($data);
            $builder->where('id', $id);
            $builder->update();
            $aView['error'] = '<div class="alert alert-success" role="alert">Modification effectué</div>';
        }
        $aView['row']= $query->getRowArray();
        $aView['dump']= $request->getPost();
        return $aView;
    }

    public function picture($id): array
    {
        $request = service('request');
        $data=$request->getPost();
        helper(['form','url']);
        $db = Database::connect();
        $builder = $db->table('image');
        $builder->where('id',$id);
        $query = $builder->get();
        $data['content']=$request->getPost('content');
        $data['content']= str_replace('<p>','',$data['content']);
        $data['content']= str_replace('</p>','',$data['content']);
        $data['content'] = str_replace('../../assets','assets',$data['content']);

        if(!empty($request->getPost('emplacement'))&&!empty($request->getPost('content'))){
            $builder = $db->table('image');
            $builder->set($data);
            $builder->where('id', $id);
            if($builder->update()){
                $aView['error'] = '<div class="alert alert-success" role="alert">Modification effectué</div>';
            }else{
                $aView['error'] = '<div class="alert alert-danger" role="alert">Aucune modification effectué</div>';
            }
        }
        $aView['row']= $query->getRowArray();
        $aView['dump']= $request->getPost();
        return $aView;
    }
}