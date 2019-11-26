<?php


namespace App\Controller;
use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class BookController extends AbstractController
{
    /**
     * @Route("/books", name="books")
     */
    public function BookShow(BookRepository $bookRepository)
    {
        //J'utilise le repository de book pour pouvoir récupérer ts les elements de ma table book
        //les repository servent à faire des requêtes select dans les tables

        //methode render qui permet d'afficher mon fichier html.twig et le résultat de ma requête SQL
        $books= $bookRepository->findAll();
        return $this->render('books.html.twig', array ('books' => $books));
    }

    /**
     * @Route("/onebook/{id}", name="onebook")
     */

    public function OneBookShow(BookRepository $bookRepository, $id)
    {
        $book= $bookRepository->find($id);
        return $this->render('book.html.twig', array ('book' => $book));
    }

    /**
     * @Route("/books_by_style", name="books_by_style")
     */

    public function getBooksByStyle(BookRepository $bookRepository)
    {
       $books = $bookRepository->getByStyle();
       dump($books); die;
    }
        // Appelle le bookRepository (en le passant en parametre de la méthode)
        // on appelle la methode que l'on créee dans le repository ("GetByGenre()")
        // cette methode est censée nous rettrouver tous les livres en focntion d'un genre
        // elle va donc exécuter une requete SELECT en BDD


}