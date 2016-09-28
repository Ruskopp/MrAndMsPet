<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 22/08/2016
 * Time: 00:01
 */

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="CategoryRepository")
 * @ORM\Table(name="categories")
 */
class Category
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
     * @var Animal
     *
     * @ORM\ManyToOne(targetEntity="Animal")
     */
    protected $animal;

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
     * @return Category
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
     * @return Category
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
     * Set animal
     *
     * @param \AppBundle\Entity\Animal $animal
     *
     * @return Category
     */
    public function setAnimal(Animal $animal = null)
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * Get animal
     *
     * @return \AppBundle\Entity\Animal
     */
    public function getAnimal()
    {
        return $this->animal;
    }
}
