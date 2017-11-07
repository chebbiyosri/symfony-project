<?php

namespace Reformes\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ReformesHomeBundle:Default:index.html.twig');
    }
}
