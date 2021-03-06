<?php

namespace GescomBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * SupplierRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SupplierRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param int $page
     * @param int $maxByPage
     * @return Paginator
     */
    public function getListByPage($page = 1, $maxByPage = 0)
    {
        $builder = $this->createQueryBuilder('p')
            ->setFirstResult(($page-1) * $maxByPage)
            ->setMaxResults($maxByPage);
        return new Paginator($builder);
    }
}
