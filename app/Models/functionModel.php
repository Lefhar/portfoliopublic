<?php


namespace App\Models;


use CodeIgniter\Model;

class functionModel extends Model
{
    public function salt($number): string
    {
        if (!empty($number) && $number >= 10) {
            return bin2hex(random_bytes($number));
        }
    }

//fonction pour assembler le mot de passe et le sel avec des symboles en plus

    /**
     * \brief fonction pour assembler le mot de passe et le sel avec des symboles en plus
     * \param  $password     le mot de passe
     * \param  $salt     un nombre pour générer un sel
     * \return $resultat    génére un mélange de sel et mot de passe
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function password($password, $salt): string
    {
        $resultat = "";
        if (!empty($salt) && !empty($password)) {
            $resultat = "?@" . $salt . "_@" . $password . "_@" . $salt;

        }
        return $resultat;
    }

    /**
     * @param $sujet
     * @param $message
     * @return string
     */
    public function templateEmail($sujet, $message): string
    {
        $aView['sujet'] = $sujet;
        $aView['message'] = $message;
        return view('templateMail/inscription', $aView);
    }
}