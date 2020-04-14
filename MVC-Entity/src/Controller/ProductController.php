<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;




class ProductController extends AbstractController
{

    public function createProduct(string $nazwa, float $cena): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product($nazwa, $cena);


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response("Zapisano produkt z id: ".$product->getId()."</br>
        Nazwa: " .$product->getName()."</br>
        Cena: " .$product->getCena());
    }

}