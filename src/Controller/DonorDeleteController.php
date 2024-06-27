<?php

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Donor;
use App\Repository\DonorRepository;
use App\Form\BlooddonorType;

#[IsGranted('ROLE_USER')]
class DonorDeleteController extends AbstractController
{
    /**
     * @Route("/donordelete/{id}", name="donordelete")
     */
    public function index(int $id,DonorRepository $DonorRepository) : Response
    {
        $entityManager = $this->getDoctrine()->getmanager();
        $donor = $entityManager->getRepository(Donor::class)->find($id);
        $entityManager->remove($donor);
        $entityManager->flush();
        return $this->redirectToRoute('doctors');
       
    }

    
    
}
