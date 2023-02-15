<?php

namespace App\Repository;

use App\Entity\CentreAnalyse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CentreAnalyse>
 *
 * @method CentreAnalyse|null find($id, $lockMode = null, $lockVersion = null)
 * @method CentreAnalyse|null findOneBy(array $criteria, array $orderBy = null)
 * @method CentreAnalyse[]    findAll()
 * @method CentreAnalyse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentreAnalyseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CentreAnalyse::class);
    }

    public function save(CentreAnalyse $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CentreAnalyse $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CentreAnalyse[] Returns an array of CentreAnalyse objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CentreAnalyse
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
