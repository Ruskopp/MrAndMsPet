<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 21/08/2016
 * Time: 23:08
 */

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="SubcategoryRepository")
 * @ORM\Table(name="subcategories")
 */
class Subcategory
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $titleSr;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $titleEng;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     */
    protected $category;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set titleSr
     *
     * @param string $titleSr
     *
     * @return Subcategory
     */
    public function setTitleSr($titleSr)
    {
        $this->titleSr = $titleSr;

        return $this;
    }

    /**
     * Get titleSr
     *
     * @return string
     */
    public function getTitleSr()
    {
        return $this->titleSr;
    }

    /**
     * Set titleEng
     *
     * @param string $titleEng
     *
     * @return Subcategory
     */
    public function setTitleEng($titleEng)
    {
        $this->titleEng = $titleEng;

        return $this;
    }

    /**
     * Get titleEng
     *
     * @return string
     */
    public function getTitleEng()
    {
        return $this->titleEng;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Subcategory
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function __toString()
    {
        return
            $this->titleEng . ' - ' .
            $this->category->getTitleEng() . ' - ' .
            $this->category->getAnimal()->getTitleEng();
    }
}
