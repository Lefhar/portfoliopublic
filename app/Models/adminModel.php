<?php


namespace App\Models;


use CodeIgniter\Model;
use Config\Database;

class adminModel extends Model
{
    public function index(): array
    {
        $db = Database::connect();
        //  $query = $db->query("select * from categorie_cv order by  position,emplacement");
        $builder = $db->table('demarcharge');
        $builder->select('*');
        //  $builder->join('image', 'image.cv_id = contenu_cv.id');
        $builder->orderBy('nom', 'asc');
        $query = $builder->get();
        $aView['row']= $query->getResultArray();
        //  $aView['row'] = $builder->get();

        return $aView;

    }


}