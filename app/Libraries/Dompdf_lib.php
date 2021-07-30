<?php

use Dompdf\Dompdf;
class Dompdf_lib
{
    public function __construct(){

        // include autoloader
        require_once 'app/Libraries/vendor/autoload.php';

        // instantiate and use the dompdf class
        $pdf = new DOMPDF();

        $CI =& get_instance();
        $CI->dompdf = $pdf;

    }
}