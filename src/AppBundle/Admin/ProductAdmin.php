<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 08/08/2016
 * Time: 14:50
 */

namespace AppBundle\Admin;

use AppBundle\Entity\Product;
use AppBundle\Entity\Subcategory;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        /** @var Product $product */
        $product = $this->getSubject();


        $fileFieldOptions = array('required' => false);
        $fileFieldOptions['data_class'] = null;
        if ($product && ($image = $product->getImage())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request_stack')->getCurrentRequest()->getBaseUrl() . '/../..' .
                $container->getParameter('products_web_directory') . '/' . $image;
            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] =
                '<img src="' . $fullPath . '" class="admin-preview" style="max-height: 200px; max-width: 200px;"/>';
        }


        $formMapper
            ->with('Public data', array(
                'class' => 'col-sm-7'
            ))
            ->add('titleEng', 'text', array(
                'label' => 'Products title (English)'
            ))
            ->add('titleSrp', 'text', array(
                'label' => 'Products title (Serbian)'
            ))
            ->add('code', 'text')
            ->add('price')
            ->add('subcategory', EntityType::class, array(
                'class'        => Subcategory::class,
                'choice_label' => function (Subcategory $subcategory) {
                    $label =
                        $subcategory->getTitleSr() . ' - ' .
                        $subcategory->getCategory()->getTitleSr() . ' - ' .
                        $subcategory->getCategory()->getAnimal()->getTitleSr();
                    return $label;
                },
            ))
            ->add('image', FileType::class, $fileFieldOptions)
            ->end()
            ->with('Private data', array(
                'class' => 'col-sm-5'
            ))
            ->add('description', 'text', array(
                'label' => 'Description.'
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
            ->add('titleEng')
            ->add('xs')
            ->add('s')
            ->add('m')
            ->add('l')
            ->add('xl')
            ->add('universal')
            ->add('subcategory');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        /** @var Product $product */
        $product = $this->getSubject();
        $listMapper
            ->addIdentifier('titleEng')
            ->add('xs')
            ->add('s')
            ->add('m')
            ->add('l')
            ->add('xl')
            ->add('universal')
            ->add('subcategory');
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('titleEng')
            ->add('xs')
            ->add('s')
            ->add('m')
            ->add('l')
            ->add('xl')
            ->add('universal')
            ->add('subcategory');
    }

    public function toString($object)
    {
        return $object instanceof Product
            ? $object->getTitleSrp()
            : 'Product'; // shown in the breadcrumb on the create view
    }
}
