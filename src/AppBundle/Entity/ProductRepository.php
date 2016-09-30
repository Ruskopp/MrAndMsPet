<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * ProductRepository
 *
 */
class ProductRepository extends EntityRepository
{
    public function findProductsByAnimal($animal, $page)
    {
        $query = $this->createQueryBuilder('p')
            ->join('p.subcategory', 's')
            ->join('s.category', 'c')
            ->join('c.animal', 'a')
            ->andWhere('a.titleEng = :animal')
            ->setParameters(array(
                'animal' => $animal,
            ))
            ->getQuery();

        return $this->paginate($query, $page);
    }

    public function findProductsByTitleEng($animal, $category, $subcategory, $page)
    {
        $query = $this->createQueryBuilder('p')
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
            ->getQuery();

        return $this->paginate($query, $page);
    }

    public function findProductsByTitleEngAll($animal, $category, $page)
    {
        $query = $this->createQueryBuilder('p')
            ->join('p.subcategory', 's')
            ->join('s.category', 'c')
            ->join('c.animal', 'a')
            ->andWhere('c.titleEng = :category')
            ->andWhere('a.titleEng = :animal')
            ->setParameters(array(
                'category' => $category,
                'animal'   => $animal,
            ))
            ->getQuery();

        return $this->paginate($query, $page);
    }

    /**
     * Paginator Helper
     *
     * Pass through a query object, current page & limit
     * the offset is calculated from the page and limit
     * returns an `Paginator` instance, which you can call the following on:
     *
     *     $paginator->getIterator()->count() # Total fetched (ie: `5` posts)
     *     $paginator->count() # Count of ALL posts (ie: `20` posts)
     *     $paginator->getIterator() # ArrayIterator
     *
     * @param Doctrine\ORM\Query $dql DQL Query Object
     * @param integer $page Current page (defaults to 1)
     * @param integer $limit The total number per page (defaults to 5)
     *
     * @return \Doctrine\ORM\Tools\Pagination\Paginator
     */
    public function paginate($dql, $page = 1, $limit = 9)
    {
        $paginator = new Paginator($dql);

        $paginator->getQuery()
            ->setFirstResult($limit * ($page - 1))// Offset
            ->setMaxResults($limit); // Limit

        return $paginator;
    }
}
