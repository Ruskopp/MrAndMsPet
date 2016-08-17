<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ));
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {

    }

    /**
     * @Route("/products", name="products")
     */
    public function productsAction(Request $request)
    {

    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {

    }
}
