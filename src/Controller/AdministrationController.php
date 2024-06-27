<?php

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\DonorRepository;
use App\Repository\UserRepository;
use App\Form\DoctorRegType;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Form\SearchdonorType;


#[IsGranted('ROLE_ADMIN')]
class AdministrationController extends AbstractController
{

      
    private $encoder ;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder=$encoder;
    }

    /**
     * @Route("/administration", name="administration")
     */
    public function index(Request $request,UserRepository $UserRepository,DonorRepository $DonorRepository):Response
    {
        $post = new User;

        $userform = $this->createForm(DoctorRegType::class, $post, [
            'action' => '/administration#appointment',
        ]);
        $userform->handleRequest($request);

        $form=$userform->createView();

        if ($userform->isSubmitted() && $userform->isValid()) {
            $post->setPassword($this->encoder->encodePassword($post,$userform['Password']->getData()));
            $em = $this->getDoctrine()->getmanager();
            $em->persist($post);
            $em->flush();
            $this->addFlash('success_addDoctor', 'Docter added successfull');
            //return $this->redirectToRoute('administration');
        }

    
    $searchcity = 'OVER THE WORLD';
   
    $searchbycity = [];
        $searchform = $this->createForm(SearchdonorType::class, $post, [
            'action' => '/administration#testimonials',
        ]);

        $searchform->handleRequest($request);
        if ($searchform->isSubmitted() && $searchform->isValid()) {
            $searchcity = strtoupper($searchform['City']->getData());
            
            $searchbycity = $DonorRepository->findBy(array('CIN_Passport'=> $searchcity));  
            //return $this->redirectToRoute('bloodcharity');
            
        }
        return $this->render('administration/index.html.twig', [
            'donors' => $DonorRepository->findAll(),'users' => $UserRepository->findAll(), 'UserForm'=>$form,'searchform' => $searchform->createView(), 'citysearch' => $searchcity, 'bycitys' => $searchbycity ,
        ]);
    }
}
