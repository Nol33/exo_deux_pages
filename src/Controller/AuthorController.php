<?php


namespace App\Controller;
use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AuthorController extends AbstractController
{
/**
 * @Route("/authors", name="authors")
 */
 public function AuthorsShow(AuthorRepository $authorRepository)
    {
        $authors= $authorRepository->findAll();
        return $this->render('authors.html.twig', array ('authors' => $authors));
    }
    /**
     * @Route("/author/{id}", name="author")
     */
    public function AuthorShow(AuthorRepository $authorRepository, $id)
    {
        $author= $authorRepository->find($id);
        return $this->render('author.html.twig', array ('author' => $author));
    }





    /**
     * @Route("/author_by_biography/{word}", name="author_by_biography")
     */
        //j'apelle la methode getByBiography de mon repository avec en parametre le mot entré dans l'url par l'utilisateur
    public function getByBiography(AuthorRepository $authorRepository, $word = null)
    {

        //AuthorRepository contient une instance de la classe AuthorRepository
        // generalement, on obtient une instance de classe (ou un objet) en utilisant le mot clé "new"
        //ici, grace a symfony, on obtient l'instance de la classe repository en la passant simplement en paramètre
        $authors = $authorRepository->getByBiography($word);
        return $this->render('authors2.html.twig', ['authors'=>$authors]);
    }
}

