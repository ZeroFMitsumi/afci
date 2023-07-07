<?php

namespace App\Repository;

use App\Entity\EmploymentSituation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EmploymentSituation>
 *
 * @method EmploymentSituation|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmploymentSituation|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmploymentSituation[]    findAll()
 * @method EmploymentSituation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmploymentSituationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmploymentSituation::class);
    }

    public function save(EmploymentSituation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EmploymentSituation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EmploymentSituation[] Returns an array of EmploymentSituation objects
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

//    public function findOneBySomeField($value): ?EmploymentSituation
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
