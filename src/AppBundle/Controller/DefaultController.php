<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Entity\Subcategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     "/{lang}",
 *     requirements={"lang" : "eng|srp"},
 *     defaults={"lang" : "srp"}
 * )
 */
class DefaultController extends Controller
{
    /**
     * @Route("", name="home")
     *
     * @param $lang
     * @return Response
     */
    public function indexAction($lang)
    {
        return $this->render($lang . '/home.html.twig', array(
            'urlEng' => $this->generateUrl('home', array('lang' => 'eng')),
            'urlSrp' => $this->generateUrl('home', array('lang' => 'srp')),
        ));
    }

    /**
     * @Route("/about", name="about")
     *
     * @param $lang
     * @return Response
     */
    public function aboutAction($lang)
    {
        return $this->render($lang . '/about.html.twig', array(
            'urlEng' => $this->generateUrl('about', array('lang' => 'eng')),
            'urlSrp' => $this->generateUrl('about', array('lang' => 'srp')),
        ));
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
     *
     * @param $lang
     * @return Response
     */
    public function contactAction($lang)
    {
        return $this->render($lang . '/contact.html.twig', array(
            'urlEng' => $this->generateUrl('contact', array('lang' => 'eng')),
            'urlSrp' => $this->generateUrl('contact', array('lang' => 'srp')),
        ));
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

    /**
     * @Route(
     *     "productst/{animal}/{category}/{subcategory}",
     *     name="productst",
     *     requirements={"animal":"cat|dog"}
     * )
     */
    public function products($language, $animal, $category, $subcategory)
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository(Category::class)->findByTitleEng($category);
        $sub = $em->getRepository(Subcategory::class)->findByTitleEng($subcategory);

        if (empty($cat) || empty($sub)) {
            return new RedirectResponse($this->generateUrl('home'));
        }

        $prod = $em->getRepository(Product::class)->findProductsByTitleEng($animal, $category, $subcategory);

        var_dump($cat);
        var_dump($sub);
        var_dump($prod);
        var_dump($language);

        return $this->render(
            $this->createView('eng', $category)
        );
    }

    /**
     * Creates view, views must be named same as categories.
     *
     * @param $language string
     * @param $category string
     *
     * @return string This is view who is gona be rendered.
     */
    private function createView($language, $category)
    {
        $view =
            $language .
            '/specificCategory/' .
            $category .
            '.html.twig';

        return $view;
    }
}
