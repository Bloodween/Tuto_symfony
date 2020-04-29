<?php

namespace App\Controller;

use App\service\Capitalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article/")
 */
class ArticleController extends AbstractController

{
    protected $articles;
    protected $capitalizer;

    public function __construct()
    {
        $this->capitalizer = new Capitalizer();
        $this->articles = [
            ["Libelle"   => $this->capitalizer->firstUpper( "ordinateur"),
                "Prix"      => "500",
                "Marque"    => $this->capitalizer->firstUpper( "SamSung")
            ],
            ["Libelle"   => $this->capitalizer->firstUpper( "voiture"),
                "Prix"      => "15000",
                "Marque"    => $this->capitalizer->firstUpper( "Fiat Panda")
            ]
        ];
    }

    /**
     * @Route("liste", name="article")
     */
    public function index()
    {
        return $this->render('article/index.html.twig', [ "liste_articles" => $this->articles]);
    }

    /**
     * @Route("desc/{id}", name="description")
     */
    public function showArticle($id){
        $article = [
            "Libelle"   => $this->capitalizer->firstUpper( "ordinateur"),
            "Prix"      => 500,
            "Marque"    => $this->capitalizer->firstUpper( "SamSung")
        ];
        return $this->render("article/show.html.twig",['art'=> $article, "action" => $id]);
    }
}
