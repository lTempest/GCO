<?php

namespace App\Repository;

use App\Entity\EtatsEvents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtatsEvents>
 *
 * @method EtatsEvents|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatsEvents|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatsEvents[]    findAll()
 * @method EtatsEvents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatsEventsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtatsEvents::class);
    }

    public function save(EtatsEvents $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EtatsEvents $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EtatsEvents[] Returns an array of EtatsEvents objects
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

//    public function findOneBySomeField($value): ?EtatsEvents
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
