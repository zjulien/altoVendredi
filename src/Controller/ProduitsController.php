<?php

namespace App\Controller;

use App\Application\Controller;
use App\Entity\produit;

class ProduitsController extends Controller {

   function default(){
    $objproduit = new Produit();
    $produits = $objproduit->getAll();
    return $this->twig->render(
        'produit/default.html.twig',
        [
            'produits' => $produits
        ]
        );



   }
}