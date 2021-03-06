<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 08/08/2016
 * Time: 14:20
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity()
 * @ORM\Table(name="products")
 */
class Product
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
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    protected $category;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    protected $subcategory;

    /**
     * @var UploadedFile
     *
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $image;

    /**
     * @var int
     *
     * @ORM\Column(type="decimal", length=100,nullable=true)
     */
    protected $price;

    /**
     * @var int
     *
     * @Assert\Range(min="0")
     *
     * @ORM\Column(type="smallint")
     */
    protected $xs = 0;

    /**
     * @var int
     *
     * @Assert\Range(min="0")
     *
     * @ORM\Column(type="smallint")
     */
    protected $s = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint")
     */
    protected $m = 0;

    /**
     * @var int
     *
     * @Assert\Range(min="0")
     *
     * @ORM\Column(type="smallint")
     */
    protected $l = 0;

    /**
     * @var int
     *
     * @Assert\Range(min="0")
     *
     * @ORM\Column(type="smallint")
     */
    protected $xl = 0;

    /**
     * @var int
     *
     * @Assert\Range(min="0")
     *
     * @ORM\Column(type="smallint")
     */
    protected $universal = 0;

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
     * Set title
     *
     * @param string $title
     *
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Product
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set xs
     *
     * @param integer $xs
     *
     * @return Product
     */
    public function setXs($xs)
    {
        $this->xs = $xs;

        return $this;
    }

    /**
     * Get xs
     *
     * @return integer
     */
    public function getXs()
    {
        return $this->xs;
    }

    /**
     * Set s
     *
     * @param integer $s
     *
     * @return Product
     */
    public function setS($s)
    {
        $this->s = $s;

        return $this;
    }

    /**
     * Get s
     *
     * @return integer
     */
    public function getS()
    {
        return $this->s;
    }

    /**
     * Set m
     *
     * @param integer $m
     *
     * @return Product
     */
    public function setM($m)
    {
        $this->m = $m;

        return $this;
    }

    /**
     * Get m
     *
     * @return integer
     */
    public function getM()
    {
        return $this->m;
    }

    /**
     * Set l
     *
     * @param integer $l
     *
     * @return Product
     */
    public function setL($l)
    {
        $this->l = $l;

        return $this;
    }

    /**
     * Get l
     *
     * @return integer
     */
    public function getL()
    {
        return $this->l;
    }

    /**
     * Set universal
     *
     * @param integer $universal
     *
     * @return Product
     */
    public function setUniversal($universal)
    {
        $this->universal = $universal;

        return $this;
    }

    /**
     * Get universal
     *
     * @return integer
     */
    public function getUniversal()
    {
        return $this->universal;
    }

    /**
     * Set xl
     *
     * @param integer $xl
     *
     * @return Product
     */
    public function setXl($xl)
    {
        $this->xl = $xl;

        return $this;
    }

    /**
     * Get xl
     *
     * @return integer
     */
    public function getXl()
    {
        return $this->xl;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set subcategory
     *
     * @param string $subcategory
     *
     * @return Product
     */
    public function setSubcategory($subcategory)
    {
        $this->subcategory = $subcategory;

        return $this;
    }

    /**
     * Get subcategory
     *
     * @return string
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
}
