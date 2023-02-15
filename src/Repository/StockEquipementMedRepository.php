<?php

namespace App\Repository;

use App\Entity\StockEquipementMed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StockEquipementMed>
 *
 * @method StockEquipementMed|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockEquipementMed|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockEquipementMed[]    findAll()
 * @method StockEquipementMed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockEquipementMedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StockEquipementMed::class);
    }

    public function save(StockEquipementMed $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StockEquipementMed $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return StockEquipementMed[] Returns an array of StockEquipementMed objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StockEquipementMed
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
