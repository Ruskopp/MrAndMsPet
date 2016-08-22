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
    protected $titleEng;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $titleSrp;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $code;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    protected $description;


    /**
     * @var Subcategory
     *
     * @ORM\ManyToOne(targetEntity="Subcategory")
     */
    protected $subcategory;

    /**
     * @var UploadedFile
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $image;

    /**
     * @var int
     *
     * @ORM\Column(type="decimal", length=100,nullable=false)
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

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Product
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set subcategory
     *
     * @param Subcategory $subcategory
     *
     * @return Product
     */
    public function setSubcategory(Subcategory $subcategory = null)
    {
        $this->subcategory = $subcategory;

        return $this;
    }

    /**
     * Get subcategory
     *
     * @return Subcategory
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }

    /**
     * Set titleEng
     *
     * @param string $titleEng
     *
     * @return Product
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
     * Set titleSrp
     *
     * @param string $titleSrp
     *
     * @return Product
     */
    public function setTitleSrp($titleSrp)
    {
        $this->titleSrp = $titleSrp;

        return $this;
    }

    /**
     * Get titleSrp
     *
     * @return string
     */
    public function getTitleSrp()
    {
        return $this->titleSrp;
    }
}
