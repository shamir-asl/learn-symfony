<?php

namespace App\Repository;

use App\Entity\AgreeblePizza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AgreeblePizza|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgreeblePizza|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgreeblePizza[]    findAll()
 * @method AgreeblePizza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgreeblePizzaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AgreeblePizza::class);
    }

    // /**
    //  * @return AgreeblePizza[] Returns an array of AgreeblePizza objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AgreeblePizza
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
