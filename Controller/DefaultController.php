<?php

namespace Jarobe\XeroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JarobeXeroBundle:Default:index.html.twig', array('name' => $name));
    }
}
