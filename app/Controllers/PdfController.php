<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use Dompdf\Css\Stylesheet;
use Dompdf\Dompdf;


class PdfController extends Controller
{

    public function index()
    {
        $homeModel = model('App\Models\homeModel');
        $aView = $homeModel->monCv();
        return view('pdf_view',$aView);
    }
//     http://portfolio.fr/pdfController/htmlToPDF
    public   function htmlToPDF(){
        $homeModel = model('App\Models\homeModel');
        $aView = $homeModel->monCv();
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true));
        $dompdf->setOptions($options);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml(view('pdf_view',$aView));

      //  $dompdf->setCss(new \Dompdf\Css\Stylesheet('../public/assets/css/bootstrap.css'));
        $dompdf->setCss(new Stylesheet($dompdf));
       // $dompdf->setDom(new DOMDocument());
        $dompdf->render();
        $dompdf->stream("cv-developpeur-web.pdf", array("Attachment"=>0));
    }
    public function download(){
        $homeModel = model('App\Models\homeModel');
        $aView = $homeModel->monCv();
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true));
        $dompdf->setOptions($options);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml(view('pdf_view',$aView));

      //  $dompdf->setCss(new \Dompdf\Css\Stylesheet('../public/assets/css/bootstrap.css'));
        $dompdf->setCss(new Stylesheet($dompdf));
       // $dompdf->setDom(new DOMDocument());
        $dompdf->render();
        $dompdf->stream("cv-developpeur-web.pdf", array("Attachment"=>1));
    }
    public function htmlToPDFsave(){
        $homeModel = model('App\Models\homeModel');
        $aView = $homeModel->monCv();
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true));
        $dompdf->setOptions($options);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml(view('pdf_view',$aView));

        $dompdf->setCss(new Stylesheet($dompdf));
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/file/cv-developpeurweb.pdf', $output);
    }

}