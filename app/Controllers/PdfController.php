<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use Dompdf\Css\Stylesheet;
use Dompdf\Dompdf;
use CodeIgniter\HTTP\Response;

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
        $response = service('response');
        $homeModel = model('App\Models\homeModel');
        $aView = $homeModel->monCv();
        $response->setStatusCode(Response::HTTP_OK);
        //$response->setBody($output);
        $response->setHeader('Content-type', 'application/pdf');
       // $response->noCache();
        $dompdf = new Dompdf();

        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true));
        $dompdf->setOptions($options);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml(view('pdf_view',$aView));

      //  $dompdf->setCss(new \Dompdf\Css\Stylesheet('../public/assets/css/bootstrap.css'));
        $dompdf->setCss(new Stylesheet($dompdf));
       // $dompdf->setDom(new DOMDocument());
       $context = stream_context_create([
        'ssl' => [
            'verify_peer' => FALSE,
            'verify_peer_name' => FALSE
        ]
    ]);
    $dompdf->setHttpContext($context);
        $dompdf->render();
        $dompdf->stream("cv-developpeur-web.pdf", array("Attachment"=>0));
    }
    public function download()
    {
        $homeModel = model('App\Models\homeModel');
        $aView = $homeModel->monCv();
        if (!empty($aView['daterow']->date) && !empty($aView['datepic']->date) && $aView['daterow']->date > $aView['datepic']->date) {
            $datedb = $aView['daterow']->date;
        } else {
            $datedb = $aView['datepic']->date;
        }

        $date = new \DateTime($datedb);
        $date->getTimestamp();
        if ($date->getTimestamp() > filemtime('assets/file/cv-developpeurweb.pdf')) {
            $dompdf = new Dompdf();
            $options = $dompdf->getOptions();
            $options->set(array('isRemoteEnabled' => true));
            $dompdf->setOptions($options);

            $dompdf->setPaper('A4', 'portrait');
            $dompdf->loadHtml(view('pdf_view', $aView));

            //  $dompdf->setCss(new \Dompdf\Css\Stylesheet('../public/assets/css/bootstrap.css'));
            $dompdf->setCss(new Stylesheet($dompdf));
            $context = stream_context_create([
                'ssl' => [
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE
                ]
            ]);
            $dompdf->setHttpContext($context);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents('assets/file/cv-developpeurweb.pdf', $output);
            $dompdf->stream("cv-developpeur-web.pdf", array("Attachment" => 1));
        } else {
            header("Content-type:application/pdf");
            header("Content-Disposition:attachment;filename=cv-developpeurweb.pdf");
            readfile("assets/file/cv-developpeurweb.pdf");
            exit();
        }
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
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE
            ]
        ]);
        $dompdf->setHttpContext($context);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/file/cv-developpeurweb.pdf', $output);
    }

}