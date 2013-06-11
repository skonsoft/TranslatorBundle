<?php

namespace Skonsoft\Bundle\TranslatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SkonsoftTranslatorBundle:Default:index.html.twig', array('name' => $name));
    }
}
