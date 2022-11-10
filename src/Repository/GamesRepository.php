<?php

namespace App\Repository;

use App\Entity\Players;
use App\Entity\Teams;
use App\Entity\Games;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Games>
 *
 * @method Games|null find($id, $lockMode = null, $lockVersion = null)
 * @method Games|null findOneBy(array $criteria, array $orderBy = null)
 * @method Games[]    findAll()
 * @method Games[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Games::class);
    }

    public function save(Games $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Games $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findPlayersAndTeamsPerGames(string $name_game)
    {
        return $this->createQueryBuilder('g')
           ->select('g.name_game', 't.tag_team', 'p.nickname', 'p.age', 'p.nationality', 'p.role','p.photograph', 'p.Twitter', 'p.Twitch')
           ->leftJoin('App\Entity\Teams', 't', 'WITH', 'g.id = t.games')
           ->leftJoin('App\Entity\Players', 'p', 'WITH', 't.id = p.team')
           ->andWhere('g.name_game = :name_game')
           ->setParameter(':name_game', $name_game)
           ->getQuery()
           ->getResult()
            ;
    }
//    /**
//     * @return Games[] Returns an array of Games objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Games
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
