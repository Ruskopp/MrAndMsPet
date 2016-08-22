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
        return $this->render('eng/home.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        return $this->render('eng/about.html.twig');
    }

    /**
     * @Route("/products", name="products")
     */
    public function productsAction(Request $request)
    {
        return $this->render('eng/products.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        return $this->render('eng/contact.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'security/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     * @Route("/products/clothes", name="clothes")
     */
    public function clothes(Request $request)
    {
        return $this->render('eng/specificCategory/clothes.html.twig');
    }


    /**
     * @Route("/products/accessories", name="accessories")
     */
    public function accessories(Request $request)
    {
        return $this->render('eng/specificCategory/accessories.html.twig');
    }
    /**
     * @Route("/products/beds", name="beds")
     */
    public function beds(Request $request)
    {
        return $this->render('eng/specificCategory/beds.html.twig');
    }
    /**
     * @Route("/products/bolls", name="bolls")
     */
    public function bolls(Request $request)
    {
        return $this->render('eng/specificCategory/bolls.html.twig');
    }
    /**
     * @Route("/products/cats", name="cats")
     */
    public function cats(Request $request)
    {
        return $this->render('eng/specificCategory/cats.html.twig');
    }
    /**
     * @Route("/products/food", name="food")
     */
    public function food(Request $request)
    {
        return $this->render('eng/specificCategory/food.html.twig');
    }
    /**
     * @Route("/products/spa", name="spa")
     */
    public function spa(Request $request)
    {
        return $this->render('eng/specificCategory/spa.html.twig');
    }
    /**
     * @Route("/products/toys", name="toys")
     */
    public function toys(Request $request)
    {
        return $this->render('eng/specificCategory/toys.html.twig');
    }

}
