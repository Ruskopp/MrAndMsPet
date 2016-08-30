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
     * @Route("/category", name="category")
     *
     * @param $lang
     * @return Response
     */
    public function categoryAction($lang)
    {
        return $this->render($lang . '/category.html.twig', array(
            'urlEng' => $this->generateUrl('category', array('lang' => 'eng')),
            'urlSrp' => $this->generateUrl('category', array('lang' => 'srp')),
        ));
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
     * @Route(
     *     "/products/{animal}",
     *     name="all_cat",
     *     requirements={"animal":"cat|dog"}
     * )
     *
     * @param $lang
     * @param $animal
     * @return Response
     */
    public function animalAction($lang, $animal)
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository(Product::class)->findProductsByAnimal($animal);

        return $this->render(
            $this->createView($lang, $animal),
            array(
                'urlEng'   => $this->generateUrl('all_cat', array(
                    'lang'     => 'eng',
                    'animal'   => $animal,
                )),
                'urlSrp'   => $this->generateUrl('all_cat', array(
                    'lang'     => 'srp',
                    'animal'   => $animal,
                )),
                'products' => $products,
            )
        );
    }





    /**
     * @Route(
     *     "/products/{animal}/{category}",
     *     name="all_products",
     *     requirements={"animal":"cat|dog"}
     * )
     *
     * @param $lang
     * @param $animal
     * @param $category
     * @return Response
     */
    public function productsAllAction($lang, $animal, $category)
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository(Category::class)->findByTitleEng($category);

        if (empty($cat)) {
            var_dump('NO ROUTEEEEEEEE');
            //return new RedirectResponse($this->generateUrl('home'));
        }

        $products = $em->getRepository(Product::class)->findProductsByTitleEngAll($animal, $category);

        if($animal == "cat") return $this->render( $this->createView($lang, $animal),
            array(
                'urlEng'   => $this->generateUrl('all_cat', array(
                    'lang'        => 'eng',
                    'animal'      => $animal,
                )),
                'urlSrp'   => $this->generateUrl('all_cat', array(
                    'lang'        => 'srp',
                    'animal'      => $animal,
                )),
                'products' => $products,
            ));


        return $this->render(
            $this->createView($lang, $category),
            array(
                'urlEng'   => $this->generateUrl('all_products', array(
                    'lang'     => 'eng',
                    'animal'   => $animal,
                    'category' => $category
                )),
                'urlSrp'   => $this->generateUrl('all_products', array(
                    'lang'     => 'srp',
                    'animal'   => $animal,
                    'category' => $category
                )),
                'products' => $products,
            )
        );
    }

    /**
     * @Route(
     *     "/products/{animal}/{category}/{subcategory}",
     *     name="products",
     *     requirements={"animal":"cat|dog"}
     * )
     *
     * @param $lang
     * @param $animal
     * @param $category
     * @param $subcategory
     * @return Response
     */
    public function productsAction($lang, $animal, $category, $subcategory)
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository(Category::class)->findByTitleEng($category);
        $sub = $em->getRepository(Subcategory::class)->findByTitleEng($subcategory);

        if (empty($cat) || empty($sub)) {
            var_dump('NO ROUTEEEEEEEE');
            //return new RedirectResponse($this->generateUrl('home'));
        }

        $products = $em->getRepository(Product::class)->findProductsByTitleEng($animal, $category, $subcategory);


        return $this->render(
            $this->createView($lang, $category),
            array(
                'urlEng'   => $this->generateUrl('products', array(
                    'lang'        => 'eng',
                    'animal'      => $animal,
                    'category'    => $category,
                    'subcategory' => $subcategory,
                )),
                'urlSrp'   => $this->generateUrl('products', array(
                    'lang'        => 'srp',
                    'animal'      => $animal,
                    'category'    => $category,
                    'subcategory' => $subcategory,
                )),
                'products' => $products,
            )
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
