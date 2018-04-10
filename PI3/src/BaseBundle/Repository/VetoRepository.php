<?php

namespace BaseBundle\Repository;

/**
 * VetoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VetoRepository extends \Doctrine\ORM\EntityRepository
{

    public function searchnomp($word){
        $q=$this->getEntityManager()
            ->createQuery("select m from BaseBundle:Veto m 
              WHERE m.nomp LIKE :word")
            ->setParameter('word','%'.$word.'%');
        return $q->getResult();
    }
}
