<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Entity\Subcategory;
use AppBundle\Form\ContactEngType;
use AppBundle\Form\ContactSrpType;
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
    public function contactAction($lang, Request $request)
    {

        if ($lang == 'eng') {
            $form = $this->createForm(ContactEngType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $name = $form->get('name')->getData();
                $email = $form->get('email')->getData();
                $message = $form->get('message')->getData();


                $form = $this->createForm(ContactEngType::class);
                return $this->render($lang . '/contact.html.twig', array(
                    'urlEng'  => $this->generateUrl('contact', array('lang' => 'eng')),
                    'urlSrp'  => $this->generateUrl('contact', array('lang' => 'srp')),
                    'form'    => $form->createView(),
                    'message' => 'Thank you for contacting us. We will be in touch shortly.'
                ));

            }

            return $this->render($lang . '/contact.html.twig', array(
                'urlEng'  => $this->generateUrl('contact', array('lang' => 'eng')),
                'urlSrp'  => $this->generateUrl('contact', array('lang' => 'srp')),
                'form'    => $form->createView(),
                'message' => 'If you have any questions or suggestion please be free to contact us!'
            ));
        } else {
            $form = $this->createForm(ContactSrpType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $name = $form->get('ime')->getData();
                $email = $form->get('email')->getData();
                $message = $form->get('poruka')->getData();


                $form = $this->createForm(ContactSrpType::class);
                return $this->render($lang . '/contact.html.twig', array(
                    'urlEng'  => $this->generateUrl('contact', array('lang' => 'eng')),
                    'urlSrp'  => $this->generateUrl('contact', array('lang' => 'srp')),
                    'form'    => $form->createView(),
                    'message' => 'Hvala Vam što ste nas kontaktirali. Javićemo Vam se uskoro.'
                ));

            }

            return $this->render($lang . '/contact.html.twig', array(
                'urlEng'  => $this->generateUrl('contact', array('lang' => 'eng')),
                'urlSrp'  => $this->generateUrl('contact', array('lang' => 'srp')),
                'form'    => $form->createView(),
                'message' => 'Ukoliko imate pitanja ili sugestije, molimo Vas ne ustručavajte se da nas kontaktirate!'
            ));
        }


    }

    /*****************************************************************************************************************/

    /**
     * @Route(
     *     "/cat/{page}/{category}",
     *     name="cat_products",
     *     defaults={"page": "1"},
     * )
     *
     * @param $lang
     * @param $page
     * @param $category
     * @return Response
     */
    public function animalAction($lang, $page, $category = null)
    {
        $em = $this->getDoctrine()->getManager();

        if ($category !== null) {
            $products = $em->getRepository(Product::class)->findProductsByTitleEngAll('cat', $category, $page);
        } else {
            $products = $em->getRepository(Product::class)->findProductsByAnimal('cat', $page);
        }

        $menuitems = $em->getRepository(Category::class)->findCategories('cat');

        return $this->render(
            $this->createView($lang),
            array(
                'urlEng'    => $this->generateUrl('cat_products', array(
                    'lang'     => 'eng',
                    'category' => $category,
                )),
                'urlSrp'    => $this->generateUrl('cat_products', array(
                    'lang'     => 'srp',
                    'category' => $category,
                )),
                'products'  => $products,
                'menuitems' => $menuitems,
            )
        );
    }


    /**
     * @Route(
     *     "/dog/{page}/{category}/{subcategory}",
     *     name="dog_products",
     *     defaults={"page": "1"},
     * )
     *
     * @param $lang
     * @param $page
     * @param $category
     * @param $subcategory
     * @return Response
     */
    public function productsAction($lang, $page, $category, $subcategory = null)
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
            $products = $em->getRepository(Product::class)->findProductsByTitleEng(
                'dog',
                $category,
                $subcategory,
                $page
            );
        } else {
            $products = $em->getRepository(Product::class)->findProductsByTitleEngAll(
                'dog',
                $category,
                $page
            );
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
