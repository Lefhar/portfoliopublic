<?php


namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
class projetsModel extends Model
{
    /**
     * @brief recupére en base de données mes divers projets
     * @return array
     */
    public function index(): array
    {
        $db = Database::connect();
        //  $query = $db->query("select * from categorie_cv order by  position,emplacement");
        $aView['pro'] = $db->table('mesprojets')->orderBy('title', 'asc')->get()->getResult();
        if(empty($aView['pro'])){
            $aView['error'] = '<div class="alert alert-warning" role="alert">Vous n\'avez encore aucun projets cliquez sur Ajouter un projet</div>';
        }
        return $aView;

    }
}