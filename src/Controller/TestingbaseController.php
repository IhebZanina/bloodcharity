<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchdonorType;

class TestingbaseController extends AbstractController
{
    /**
     * @Route("/testingbase", name="testingbase")
     */
    public function index(Request $request): Response
    {

        /*  $searchform = $this->createForm(SearchdonorType::class);
        $city = '';
        $searchform->handleRequest($request);

        if ($searchform->isSubmitted() && $searchform->isValid()) {
            $city = $searchform->getData();
        }
*/
        return $this->render('testingbase/index.html.twig', []);
    }
}
