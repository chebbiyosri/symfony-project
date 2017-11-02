<?php

namespace Reformes\ActionsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ReformesActionsBundle:Default:index.html.twig');
    }
}
