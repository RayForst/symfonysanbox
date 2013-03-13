<?php

namespace Shop\WebBundle\ShopController;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShopController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebBundle:Frontpage:index.html.twig', array());
    }
}
