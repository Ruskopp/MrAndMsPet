<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Entity\Subcategory;
use AppBundle\Form\ContactType;
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
     * @param Request $request
     * @return Response
     */
    public function contactAction($lang,Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form->get('name')->getData();
            $email = $form->get('email')->getData();
            $message = $form->get('message')->getData();


        }

        return $this->render($lang . '/contact.html.twig', array(
            'urlEng' => $this->generateUrl('contact', array('lang' => 'eng')),
            'urlSrp' => $this->generateUrl('contact', array('lang' => 'srp')),
            'form' => $form->createView(),
        ));
    }

    /*****************************************************************************************************************/

    /**
     * @Route(
     *     "/cat/{category}",
     *     name="cat_products",
     * )
     *
     * @param $lang
     * @param $category
     * @return Response
     */
    public function animalAction($lang, $category = null)
    {
        $em = $this->getDoctrine()->getManager();

        if ($category !== null) {
            $products = $em->getRepository(Product::class)->findProductsByTitleEngAll('cat', $category);
        } else {
            $products = $em->getRepository(Product::class)->findProductsByAnimal('cat');
        }

        $menuitems = $em->getRepository(Category::class)->findCategories('cat');

        return $this->render(
            $this->createView($lang),
            array(
                'urlEng'   => $this->generateUrl('cat_products', array(
                    'lang' => 'eng',
                    'category' => $category,
                )),
                'urlSrp'   => $this->generateUrl('cat_products', array(
                    'lang' => 'srp',
                    'category' => $category,
                )),
                'products' => $products,
                'menuitems' => $menuitems,
            )
        );
    }


    /**
     * @Route(
     *     "/dog/{category}/{subcategory}",
     *     name="dog_products",
     * )
     *
     * @param $lang
     * @param $category
     * @param $subcategory
     * @return Response
     */
    public function productsAction($lang, $category, $subcategory = null)
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository(Category::class)->findByTitleEng($category);
        $sub = $em->getRepository(Subcategory::class)->findByTitleEng($subcategory);

        if (empty($cat)) {
            var_dump('NO ROUTEEEEEEEE');
            //return new RedirectResponse($this->generateUrl('home'));
        }

        if ($subcategory !== null && empty($sub)) {
            var_dump('NO ROUTEEEEEEEE');
            //return new RedirectResponse($this->generateUrl('home'));
        }

        if ($subcategory !== null) {
            $products = $em->getRepository(Product::class)->findProductsByTitleEng('dog', $category, $subcategory);
        } else {
            $products = $em->getRepository(Product::class)->findProductsByTitleEngAll('dog', $category);
        }

        $menuitems = $em->getRepository(Subcategory::class)->findSubcategories('dog', $category);

        return $this->render(
            $this->createView($lang),
            array(
                'urlEng'    => $this->generateUrl('dog_products', array(
                    'lang'        => 'eng',
                    'category'    => $category,
                    'subcategory' => $subcategory,
                )),
                'urlSrp'    => $this->generateUrl('dog_products', array(
                    'lang'        => 'srp',
                    'category'    => $category,
                    'subcategory' => $subcategory,
                )),
                'products'  => $products,
                'menuitems' => $menuitems,
                'category'  => $category,
            )
        );
    }

    /**
     * Creates view, views must be named same as categories.
     *
     * @param $language string
     *
     * @return string This is view who is gona be rendered.
     */
    private function createView($language)
    {
        $view =
            $language . '/products.html.twig';

        return $view;
    }
}
