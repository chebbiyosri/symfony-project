<?php

namespace Reformes\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/index")
     */
    public function indexAction()
    {
         $em = $this->getDoctrine()->getManager();

        $blogs = $em->getRepository('ReformesActionsBundle:Blog')->findAll();

        return $this->render('ReformesHomeBundle:Home:index.html.twig', array(
            'blogs' => $blogs,
        ));
//        return $this->render('ReformesHomeBundle:Home:index.html.twig', array(
//            // ...
//        ));
    }

    /**
     * @Route("/axes")
     */
    public function axesAction()
    {
        return $this->render('ReformesHomeBundle:Home:axes.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/actions")
     */
    public function actionsAction()
    {
        return $this->render('ReformesHomeBundle:Home:actions.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/documentation")
     */
    public function documentationAction()
    {
        return $this->render('ReformesHomeBundle:Home:documentation.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/didacticiels")
     */
    public function didacticielsAction()
    {
        return $this->render('ReformesHomeBundle:Home:didacticiels.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/grandpublic")
     */
    public function grandpublicAction()
    {
        return $this->render('ReformesHomeBundle:Home:grandpublic.html.twig', array(
            // ...
        ));
    }
    
    /**
     * @Route("/medias")
     */
    public function mediasAction()
    {
        return $this->render('ReformesHomeBundle:Home:medias.html.twig', array(
            // ...
        ));
    }
    
    /**
     * @Route("/faq")
     */
    public function faqAction()
    {
        return $this->render('ReformesHomeBundle:Home:faq.html.twig', array(
            // ...
        ));
    }

}
