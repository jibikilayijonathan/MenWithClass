<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/inscription", name="register")
     */
    public function index( Request $request)
    {
        $user = new User();
        $form= $this->createForm(RegisterType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $user=$form->getData();
            $doctrine=$this->getDoctrine()->getManager();
            $doctrine->persist($user);
            $doctrine->flush();
            dd($user);
        }
        return $this->render('register/index.html.twig',['form'=>$form->createView()]);
    }
}
