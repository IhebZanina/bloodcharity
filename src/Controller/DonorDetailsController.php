<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DonorRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Dompdf\Dompdf;
use Dompdf\Options;

#[IsGranted('ROLE_USER')]
class DonorDetailsController extends AbstractController
{
    /**
     * @Route("/donordetails/{id}/{emailTo}", name="donordetails")
     */
    public function index($emailTo,$id, DonorRepository $DonorRepository,MailerInterface $mailer ) : Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Courier');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $dompdf->set_option('isRemoteEnabled',true);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('donorDetails/index.html.twig', [
             'donor' => $DonorRepository->find($id),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        $output=$dompdf->output();
         $dompdf->stream("donneurSang.pdf", [
            "Attachment" => true
        ]);
        $public_dir = $this->getParameter('kernel.project_dir').'/public/document';
        $pdfFilepath = $public_dir .'/donneurSang.pdf' ;
        file_put_contents($pdfFilepath,$output);

        
          //send email section disabled cause i deleted the parameters in .env 
            
            $email = (new Email())
            
            ->from('issatso-connection@outlook.com')
            ->to($emailTo)
            
            ->subject('Certificat Donneur Sang')
            ->html('<b style="color:red;">Merci pour votre don, voila votre certificat</b>')
            ->attachFromPath($this->getParameter('kernel.project_dir').'\public\document\donneurSang.pdf', 'Certificat.pdf');
            $mailer->send($email);
        // Output the generated PDF to Browser (force download)
       

        return $this->redirectToRoute('doctors');

    }
}
