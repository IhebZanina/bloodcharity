<?php

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Donor;
use App\Repository\DonorRepository;
use App\Form\BlooddonorType;
use Symfony\Component\Security\Core\Security;
use App\Form\SearchdonorType;
use Symfony\Component\HttpFoundation\Request;

#[IsGranted('ROLE_USER')]
class DoctorsController extends AbstractController
{
    
    /**
     * @Route("/doctors", name="doctors")
     */
    public function index(Request $request,DonorRepository $DonorRepository ) : Response
    {

         //search city form
        $post = new Donor;
    
    $searchcity = 'OVER THE WORLD';
   
    $searchbycity = [];
        $searchform = $this->createForm(SearchdonorType::class, $post, [
            'action' => '/doctors#testimonials',
        ]);

        $searchform->handleRequest($request);
        if ($searchform->isSubmitted() && $searchform->isValid()) {
            $searchcity = strtoupper($searchform['City']->getData());
            
            $searchbycity = $DonorRepository->findBy(array('CIN_Passport'=> $searchcity));  
            //return $this->redirectToRoute('bloodcharity');
            
        }
        
        return $this->render('doctors/index.html.twig', [
             'donors' => $DonorRepository->findAll(), 'searchform' => $searchform->createView(), 'citysearch' => $searchcity, 'bycitys' => $searchbycity ,
        ]);
    }

    
    
}
