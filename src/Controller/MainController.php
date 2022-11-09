<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController {

    /**
     * @Route("/")
     */
    public function home():Response{
        return $this->render("main/home.html.twig");
    }

    /**
     * @Route("/a-propos")
     */
    public function aboutUs():Response{
        return $this->render("main/about-us.html.twig");
    }

    /**
     * @Route("mentions-legales")
     */
    public function legalStuff():Response{
        return $this->render("main/legal-stuff.html.twig");
    }    

}