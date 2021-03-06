<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class homeModel extends Model
{
    public function index(): array
    {
        $db = Database::connect();
        //  $query = $db->query("select * from categorie_cv order by  position,emplacement");
        $builder = $db->table('contenu_cv');
        $builder->where('public', 1);
        $builder->orderBy('position,emplacement', 'asc');
        $aView['pic'] = $db->table('image')->orderBy('emplacement', 'asc')->get()->getResult();
        $query = $builder->get();
        $aView['row'] = $query->getResult();
        $aView['pro'] = $db->table('mesprojets')->orderBy('title', 'asc')->get()->getResult();
        //  $aView['row'] = $builder->get();
        $aView['head'] = $db->table('contenu_cv')->select('content')->where('emplacement','right')->where('position',2)->get()->getRow();
        return $aView;

    }

    public function monCv(): array
    {
        $db = Database::connect();
        $aView['head']="";
        $aView['row'] = $db->table('contenu_cv')->orderBy('position,emplacement', 'asc')->get()->getResult();
        $aView['pic'] = $db->table('image')->orderBy('emplacement', 'asc')->get()->getResult();
        $aView['daterow'] = $db->table('contenu_cv')->select('date')->orderBy('date', 'desc')->get()->getRow();
        $aView['datepic'] = $db->table('image')->select('date')->orderBy('date', 'desc')->get()->getRow();

        if (empty($aView['row'])) {
            $aView['error'] = '<div class="alert alert-warning" role="alert">Vous n\'avez encore aucun bloc cliquez sur Ajouter un bloc</div>';
        }
        if (empty($aView['pic'])) {
            $aView['error'] = '<div class="alert alert-warning" role="alert">Vous n\'avez encore aucun bloc image</div>';
        }
        return $aView;

    }
}