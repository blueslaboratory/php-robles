<?php

// Video 449: Crear Repositorios

namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
// use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;


class AnimalRepository extends ServiceEntityRepository{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Animal::class);
    }
    
    // Si no tengo vinculado mi repositorio con mi entidad animal, solo
    // me va a dejar utilizar metodos que empiezen por findBy, findOneBy, countBy
    public function getAnimalsOrderId($order) {
        echo "<h4> Video 446 - Query builder</h4>";
        $qb = $this->createQueryBuilder('a') // animales as a
                       // ->andWhere("a.raza = 'americana'")
                       // ->andWhere("a.raza = :raza")
                       // ->setParameter('raza', 'americana')
                          ->orderBy('a.id', 'DESC')
                          ->getQuery();
        $resultset = $qb->execute();
        
        $coleccion = array(
            'name'=>'Coleccion de animales',
            'animales' => $resultset
        );
        
        return $coleccion;
        
    }
}
