<?php

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;


#[IsGranted('ROLE_ADMIN')]
class DoctorDeleteController extends AbstractController
{
    /**
     * @Route("/doctordelete/{id}", name="doctordelete")
     */
    public function index(int $id,UserRepository $UserRepository) : Response
    {
        $entityManager = $this->getDoctrine()->getmanager();
        $doctor = $entityManager->getRepository(User::class)->find($id);
        $entityManager->remove($doctor);
        $entityManager->flush();
        return $this->redirectToRoute('administration');
       
    }

    
    
}
