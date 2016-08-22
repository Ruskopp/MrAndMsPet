<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 22/08/2016
 * Time: 00:04
 */

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="animals")
 */
class Animal
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
     * @return Animal
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
     * @return Animal
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
}
