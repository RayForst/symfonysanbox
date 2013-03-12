<?php

namespace Shop\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebBundle:Frontpage:index.html.twig', array());
    }
}
