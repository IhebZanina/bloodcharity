<?php

namespace App\Controller;

use App\Form\BlooddonorType;
use App\Form\SearchdonorType;
use App\Form\ContactdonorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Donor;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\DonorRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class BloodcharityController extends AbstractController
{
    /**
     * @Route("/", name="bloodcharity" ,methods={"GET","POST"})
     */
    public function home(Request $request, DonorRepository $DonorRepository , MailerInterface $mailer  ): Response
    {
        
        //blood donor form
        $post = new Donor;

        $donorform = $this->createForm(BlooddonorType::class, $post, [
            'action' => '/#appointment',
        ]);

        $donorform->handleRequest($request);

        if ($donorform->isSubmitted() && $donorform->isValid()) {
            $post->setDatePost(new \DateTime());
            $em = $this->getDoctrine()->getmanager();
            $em->persist($post);
            $em->flush();
            $this->addFlash('success', 'Thank you! Make sure you will be available next days.');
            return $this->redirectToRoute('bloodcharity');
        }

        //search city form
       
    $searchcity = 'OVER THE WORLD';
   
    $searchbycity = [];
        $searchform = $this->createForm(SearchdonorType::class, $post, [
            'action' => '/#testimonials',
        ]);

        $searchform->handleRequest($request);
        if ($searchform->isSubmitted() && $searchform->isValid()) {
            $searchcity = strtoupper($searchform['City']->getData());
            
            $searchbycity = $DonorRepository->findBy(array('City'=> $searchcity));  
            //return $this->redirectToRoute('bloodcharity');
            
        }

        

        //contact form
        $name = '' ;
        $contactform = $this->createForm(ContactdonorType::class, $post, [
            'action' => '/#contact',
        ]);

         $contactform->handleRequest($request);
        
         /* send email section disabled cause i deleted the parameters in .env 

            if ($contactform->isSubmitted() && $contactform->isValid()) {
            $name = $contactform['First_Name']->getData();
            $emailfrom = $contactform['Last_Name']->getData();
            $subject = $contactform['City']->getData();
            $message = $contactform['CIN_Passport']->getData();

            $email = (new Email())
            ->from($emailfrom)
            ->to('iheb257@gmail.com')
            
            ->subject($subject)
            ->html($message
        );
           

            $mailer->send($email);
        }
        */

        //page rendering and post values to twig
        return $this->render('bloodcharity/home.html.twig', [
            'formdonor' => $donorform->createView(), 'donors' => $DonorRepository->findAll(),  
            'searchform' => $searchform->createView(), 'citysearch' => $searchcity, 'bycitys' => $searchbycity ,
            'contactform' => $contactform->createView()
        ]);
    }
}
