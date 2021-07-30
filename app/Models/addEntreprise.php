<?php


namespace App\Models;


use CodeIgniter\Model;
use Config\Database;

class addEntreprise extends Model
{
    public function index()
    {
        $request = service('request');
        $db = Database::connect();
        $data = $request->getPost();
        if (!empty($data)) {
            $builder = $db->table('demarcharge');
            $builder->select('email');
            $builder->where('email', $request->getPost('email'));
            $query = $builder->get();
            $req = $query->getRow();
            if (!empty($req)) {
                $aView['error'] = '<div class="alert alert-danger" role="alert">Entreprise déjà présente</div>';
            } else {
                $data['date'] = date('Y-m-d H:i:s');
                $data['etat'] = "attente";
                $data['status'] = 0;
                $aView['error'] = '';
                $builder = $db->table('demarcharge');
                $builder->set($data);
                $builder->insert();
            }


        } else {
            $aView['error'] = '';
        }
        return $aView;
    }

}