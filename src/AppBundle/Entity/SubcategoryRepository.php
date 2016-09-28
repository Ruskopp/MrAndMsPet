<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SubcategoryRepository
 *
 */
class SubcategoryRepository extends EntityRepository
{
    public function findSubcategories($animal, $category)
    {
        return $this->createQueryBuilder('s')
            ->join('s.category', 'c')
            ->join('c.animal', 'a')
            ->andWhere('a.titleEng = :animal')
            ->andWhere('c.titleEng = :category')
            ->andWhere('s.titleEng <> :none')
            ->setParameters(array(
                'animal'   => $animal,
                'category' => $category,
                'none'     => 'none',
            ))
            ->getQuery()
            ->getResult();
    }
}
