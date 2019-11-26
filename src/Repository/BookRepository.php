<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function getByStyle()
    {
        // Récupérer le query builder (car c'est le query builder qui permet de faire la requête SQL
        $queryBuilder = $this->createQueryBuilder('b');

        //  Construire la requête façon SQL mais en PHP
        // Traduire la requête en véritable requête SQL
        $query = $queryBuilder->select('b')
            ->where('b.style = :style')
            ->setParameter('style', 'Roman')
            ->getQuery();

        // Exécuter la requête SQL en BDD pour récupérer les bons livres
        $books = $query->getArrayResult();
        return $books;
    }
}
