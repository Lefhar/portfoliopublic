<?php


namespace App\Models;


use CodeIgniter\Model;
use Config\Database;

class servermailModel extends Model
{
    public function index()
    {

        $db = Database::connect();
        $builder = $db->table('servermail');
        $query = $builder->get();
        $req = $query->getRowArray();

        $aView['protocol']= 'smtp';
        $aView['SMTPHost']= $req['smtp'];
        $aView['fromEmail']= $req['username'];
        $aView['SMTPUser']= $req['username'];
        $aView['SMTPPass']= $req['password'];
        $aView['SMTPPort']= (int)$req['port'];
        return $aView;
    }
}