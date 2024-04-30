<?php

namespace App\Repository;

use App\Entity\Equipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use Doctrine\ORM\Query\Expr\Join;

/**
 * @extends ServiceEntityRepository<Equipe>
 *
 * @method Equipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipe[]    findAll()
 * @method Equipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipe::class);
    }

    //    /**
    //     * @return Equipe[] Returns an array of Equipe objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Equipe
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findClassement()
    {
        return $this->createQueryBuilder('e')
            ->select('e.nom AS nEquipe', 'COUNT(p.idGagnant) AS vEquipe')
            // ->from(Equipe::class, 'equipe')
            ->join('e.parties', 'p', Join::WITH, 'p.idBleu = e.id')
            // ->join('e.parties', 'p')
            // ->groupBy('nEquipe', 'vEquipe')
            ->groupBy('nEquipe')
            ->orderBy('vEquipe', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
}
