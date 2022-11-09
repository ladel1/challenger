<?php 

namespace App\Controller;

use App\Entity\Challenge;
use App\Form\ChallengeType;
use App\Repository\ChallengeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChallengeController extends AbstractController {
    /**
     * @Route("/challenge/ajouter")
     */
    public function add(Request $request,ChallengeRepository $repo):Response{
        $challenge = new Challenge;
        $challengeForm = $this->createForm(ChallengeType::class,$challenge);
        $challengeForm->handleRequest($request);

        if($challengeForm->isSubmitted() && $challengeForm->isValid()){
            $repo->add($challenge,true);
            $this->addFlash("success","Le défi a bien été ajouté!");
            return $this->redirectToRoute("app_challenge_detail",["id"=>$challenge->getId()]);
        }

        return $this->render("challenge/add.html.twig",[
            "challengeForm"=>$challengeForm->createView()
        ]);
    }

    /**
     * @Route("/challenge/detail/{id}")
     */
    public function detail(Challenge $challenge):Response{
        return $this->render("challenge/details.html.twig",compact("challenge"));
    }

    /**
     * @Route("/challenges")
     */
    public function list(ChallengeRepository $repo):Response{
        return $this->render("challenge/list.html.twig",[
            "challenges"=>$repo->findAll()
        ]);
    } 
}