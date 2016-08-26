<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 */
class ProductRepository extends EntityRepository
{
    public function findProductsByTitleEng($animal, $category, $subcategory)
    {
        return $this->createQueryBuilder('p')
            ->join('p.subcategory', 's')
            ->join('s.category', 'c')
            ->join('c.animal', 'a')
            ->where('s.titleEng = :subcategory')
            ->andWhere('c.titleEng = :category')
            ->andWhere('a.titleEng = :animal')
            ->setParameters(array(
                'subcategory' => $subcategory,
                'category'    => $category,
                'animal'      => $animal,
            ))
            ->getQuery()
            ->getResult();
    }

    public function findProductsByTitleEngAll($animal, $category)
    {
        return $this->createQueryBuilder('p')
            ->join('p.subcategory', 's')
            ->join('s.category', 'c')
            ->join('c.animal', 'a')
            ->andWhere('c.titleEng = :category')
            ->andWhere('a.titleEng = :animal')
            ->setParameters(array(
                'category'    => $category,
                'animal'      => $animal,
            ))
            ->getQuery()
            ->getResult();
    }
}
