<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 08/08/2016
 * Time: 14:50
 */

namespace AppBundle\Admin;

use AppBundle\Entity\Product;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Public data', array(
                'class' => 'col-sm-7'
            ))
            ->add('title', 'text', array(
                'label' => 'Products title'
            ))
            ->add('category', 'choice', array(
                'choices' => array(
                    'PAS - Odeca'     => 'PAS - Odeca',
                    'PAS - Aksesoari' => 'PAS - Aksesoari',
                    'PAS - Krevet'    => 'PAS - Krevet',
                    'PAS - Spa'       => 'PAS - Spa',
                    'PAS - Igracke'   => 'PAS - Igracke',
                    'PAS - Posude'    => 'PAS - Posude',
                )
            ))
            ->add('subcategory', 'choice', array(
                'choices' => array(
                    'nema (none)'                 => 'nema (none)',
                    'majice (t-shirts)'           => 'majice (t-shirts)',
                    'duksevi (hoodies)'           => 'duksevi (hoodies)',
                    'dzemperi (sweaters)'         => 'dzemperi (sweaters)',
                    'kabanice (raincoats)'        => 'kabanice (raincoats)',
                    'jakne (jackets)'             => 'jakne (jackets)',
                    'prsluci (vests)'             => 'prsluci (vests)',
                    'kombinezoni (jumpsuits)'     => 'kombinezoni (jumpsuits)',
                    'haljine (dresses)'           => 'haljine (dresses)',
                    'suknje (skirts)'             => 'suknje (skirts)',
                    'farmerke (jeans)'            => 'farmerke (jeans)',
                    'kosulje (shirts)'            => 'kosulje (shirts)',
                    'kaputi (coats)'              => 'kaputi (coats)',
                    'gace (panties)'              => 'gace (panties)',
                    'ogrlice (collars)'           => 'ogrlice (collars)',
                    'povodci (leashes)'           => 'povodci (leashes)',
                    'amovi (harnesses)'           => 'amovi (harnesses)',
                    'masne (bows)'                => 'masne (bows)',
                    'kravate (ties)'              => 'kravate (ties)',
                    'adresari (address)'          => 'adresari (address)',
                    'vlazne maramice (wet wipes)' => 'vlazne maramice (wet wipes)',
                    'parfemi (perfumes)'          => 'parfemi (perfumes)',
                    'samponi (shampoos)'          => 'samponi (shampoos)',
                )
            ))
            ->add('image', 'file', array(
                'required' => false
            ))
            ->end()
            ->with('Private data', array(
                'class' => 'col-sm-5'
            ))
            ->add('xs', null, array('label' => 'Extra small [ XS ]'))
            ->add('s', null, array('label' => 'Small [ S ]'))
            ->add('m', null, array('label' => 'Medium [ M ]'))
            ->add('l', null, array('label' => 'Large [ L ]'))
            ->add('xl', null, array('label' => 'Extra Large [ XL ]'))
            ->add('universal', null, array('label' => 'Universal [ Product without size ]'))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('xs')
            ->add('s')
            ->add('m')
            ->add('l')
            ->add('xl')
            ->add('universal')
            ->add('category');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('xs')
            ->add('s')
            ->add('m')
            ->add('l')
            ->add('xl')
            ->add('universal')
            ->add('category');
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('xs')
            ->add('s')
            ->add('m')
            ->add('l')
            ->add('xl')
            ->add('universal')
            ->add('category');
    }

    public function toString($object)
    {
        return $object instanceof Product
            ? $object->getTitle()
            : 'Product'; // shown in the breadcrumb on the create view
    }
}
