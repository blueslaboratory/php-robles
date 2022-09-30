<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Animal;

// Para crear campos de formulario
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request; // para recibir datos por POST

// Para usar la sesion flash
use Symfony\Component\HttpFoundation\Session\Session;

// Importando el formulario que hemos encapsulado
use App\Form\AnimalType;

// Paquete para validar:
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Email;


// Video 438
// http://aprendiendo-symfony.com.devel/animal/index
// http://aprendiendo-symfony.com.devel/animal/save
// php bin/console make:controller AnimalController

class AnimalController extends AbstractController {

    // Video 458. Validar datos aislados
    // http://aprendiendo-symfony.com.devel/validar-email/pepe@pepe.com
    // http://aprendiendo-symfony.com.devel/validar-email/pepe@pepe
    // https://symfony.com/doc/4.4/reference/constraints.html
    public function validarEmail($email){
        $validator = Validation::createValidator();
        $errores = $validator->validate($email, [
            new Email()
        ]);
        // var_dump($email);
        // die();
        
        if(count($errores) != 0){
            echo "El email NO SE HA VALIDADO correctamente";
            foreach($errores as $error){
		echo $error->getMessage()."<br/>";
            }
        }else{
            echo "El email HA SIDO validado correctamente";
        }
        
        die();
    }
    
    
    // Video 451 - Introduccion a los formularios en Symfony 4
    // Video 452 - Crear formularios
    // http://aprendiendo-symfony.com.devel/crear-animal/
    
    public function crearAnimal(Request $request){
        $animal = new Animal();
        $form = $this->createForm(AnimalType::class, $animal);
        // Video 457 - Formularios separados en clases
        // Ver src/Form/AnimalType
                              
        // Video 454 - Recibir datos del formulario
        // Video 455 - Validar el formulario
        // Guardarlo en la BBDD
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            // var_dump($animal);
            $em = $this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();
            
            // Sesion flash
            $session = new Session();
            // $session->start(); // la sesion no hace falta iniciarla
            $session->getFlashBag()->add('message', 'Animal creado');
            
            // para redireccionar a la ruta crear animal
            return $this->redirectToRoute('crear_animal');
        }
        
        return $this->render('animal/crear-animal.html.twig',[
            'form' => $form->createView()
        ]);
    }
    
    /*
    public function crearAnimal(Request $request){
        $animal = new Animal();
        $form = $this->createFormBuilder($animal)
                     ->setAction($this->generateUrl('animal_save'))
                     ->setMethod('POST') // el metodo es POST por defecto, esta linea se puede quitar
                // Ver src/Form/AnimalType
                        ->add('tipo', TextType::class, [
                            'label' => 'Tipo de animal'
                        ])
                        ->add('color', TextType::class)
                        ->add('raza', TextType::class)
                        ->add('submit', SubmitType::class, [
                            'label' => 'Crear animal',
                            'attr' => ['class' => 'btn btn-success']
                        ])
                            
                     ->getForm();
                
        // Video 454 - Recibir datos del formulario
        // Video 455 - Validar el formulario
        // Guardarlo en la BBDD
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            // var_dump($animal);
            $em = $this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();
            
            // Sesion flash
            $session = new Session();
            // $session->start(); // la sesion no hace falta iniciarla
            $session->getFlashBag()->add('message', 'Animal creado');
            
            // para redireccionar a la ruta crear animal
            return $this->redirectToRoute('crear_animal');
        }
        
        return $this->render('animal/crear-animal.html.twig',[
            'form' => $form->createView()
        ]);
    }
    */



    // Video 441 - Find all
    // Video 442 - Tipos de Find 
    // http://aprendiendo-symfony.com.devel/animal/index
    public function index(): Response {
        // Cargar repositorio
        $animal_repo = $this->getDoctrine()->getRepository(Animal::class);
        
        // Sacar todos los objetos, continua en el return
        $animales = $animal_repo->findAll();
        
        // Sacar un unico objeto de tipo vaca
        echo "<h3>Sacar un unico objeto de tipo vaca</h3>";
        $animal = $animal_repo->findOneBy([
            'tipo'=>'vaca'
        ]);        
        var_dump($animal);
        
        // Sacar todos los objetos de raza africana,
        // si fuese findOneBy, sacaria la primera instancia de la lista de objetos
        echo "<h3>Sacar todos los objetos de raza africana</h3>";
        $africana = $animal_repo->findBy([
            'raza'=>'africana'
        ],[
            'id' => 'DESC'
        ]);
        var_dump($africana);
        
        
        
        // Video 446 - Query Builder
        // Query builder
        // https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/query-builder.html
        echo "<h3> Video 446 - Query builder</h3>";
        $qb = $animal_repo->createQueryBuilder('a') // animales as a
                       // ->andWhere("a.raza = 'americana'")
                       // ->andWhere("a.raza = :raza")
                       // ->setParameter('raza', 'americana')
                          ->orderBy('a.id', 'DESC')
                          ->getQuery();
        $resultset = $qb->execute();
        var_dump($resultset);
        
        
        
        // Video 447 - DQL: Doctrine Query Language
        echo "<h3> Video 447 - DQL: Doctrine Query Language</h3>";
        $em = $this->getDoctrine()->getManager();
        $dql0 = "SELECT a FROM App\Entity\Animal a WHERE a.raza = 'americana'";
        $dql1 = "SELECT a FROM App\Entity\Animal a ORDER BY a.id DESC";
        $query = $em->createQuery($dql1);
        $resultset = $query->execute(); 
        var_dump($resultset);
                
        
        
        // Video 448 - SQL en Symfony 4 y Symfony 5
        echo "<h3>Video 448 - SQL en Symfony 4 y Symfony 5</h3>";        
        $conection = $this->getDoctrine()->getConnection();
        $sql = 'SELECT * FROM animales ORDER BY id DESC';
        $prepare = $conection->prepare($sql);
        $prepare->execute();
        //$resultset = $prepare->fetch(); //saca solo 1 animal
        $resultset = $prepare->fetchAll(); //saca todos los animales, array de arrays
        var_dump($resultset);
        
        
        
        // Video 449: Crear Repositorios
        echo "<h3>Video 449: Crear Repositorios</h3>";   
        $animals = $animal_repo->getAnimalsOrderId('DESC');
        var_dump($animals);
        
        
        // Sacar todos los objetos
        return $this->render('animal/index.html.twig', [
                    'controller_name' => 'AnimalController',
                    'animales' => $animales
        ]);
    }
    
    
    // Video 454 - Recibir datos del formulario
    // http://aprendiendo-symfony.com.devel/crear-animal
    public function save(Request $request){
        /*
        var_dump($request->get('form')); // 'form' me devuelve todo el array
        die();
         
         */
    }
    
    
    // Video 438 - Guardar en la base de datos
    // http://aprendiendo-symfony.com.devel/animal/save
    public function save2(){
        
        //echo "<h1>Hola mundo</h1>"
        // Guardar en una tabla de la BD
        
        // Cargo el EM(entity Manager)
        $entityManager = $this->getDoctrine()->getManager();
        
        // Creo el objeto y le doy valores
        $animal = new Animal();
        $animal->setTipo('Avestruz');
        $animal->setColor('verde');
        $animal->setRaza('africana');
        
        // Guardar objeto en doctrine
        $entityManager->persist($animal);
        
        // Volcar datos en la tabla
        $entityManager->flush();
        
        return new Response('El animal guardado tiene el id: '.$animal->getId());
    }
    
    
    // Video 440 - Find
    // public function animal($id){
    // http://aprendiendo-symfony.com.devel/animal/1
     
    // Video 443 - Conseguir un objeto automatico
    // http://aprendiendo-symfony.com.devel/animal/1
    // http://aprendiendo-symfony.com.devel/animal/10
    public function animal(Animal $animal = null){
        
        /*
        // Cargar repositorio
        $animal_repo = $this->getDoctrine()->getRepository(Animal::class);
        
        // Consulta
        $animal = $animal_repo->find($id);
        */
        
        // Comprobar si el resultado es correcto
        if(!$animal){
            $message = 'El animal no existe';
        }else{
            $message = 'Tu animal elegido es: '.$animal->getTipo().' - '.$animal->getRaza();
        }
        
        return new Response($message);
    }
    
    
    // Video 444 - Actualizar registros
    // http://aprendiendo-symfony.com.devel/animal/update/1
    public function update($id){        
        
        // Cargar doctrine
        $doctrine = $this->getDoctrine();
        
        // Cargar entityManager
        $em = $doctrine->getManager();
        
        // Cargar repo Animal
        $animal_repo = $em->getRepository(Animal::class);
        
        // Find para conseguir el objeto
        $animal = $animal_repo->find($id);        
        
        // Comprobar si el objeto me llega
        if(!$animal){
            $message = 'El animal no existe en la DB';           
        }else{
            // Asignarle los valores al objeto
            $pastanimal = $animal->getTipo();
            $animal->setTipo("Perro $id");
            $animal->setColor('rojo');

            // Persistir en doctrine el objeto
            $em->persist($animal);

            // Guardar en la BD
            $em->flush();
            $message = 'Has actualizado el animal '.$animal->getId().
                       ' de '.$pastanimal.
                       ' a '.$animal->getTipo();
        }
                
        // Respuesta
        return new Response($message);
    }
    
    
    // Video 445 - Borrar elementos de la BBDD
    // http://aprendiendo-symfony.com.devel/animal/delete/2
    public function delete(Animal $animal = null){
        // Cargar el EM
        $em = $this->getDoctrine()->getManager();
        
        if($animal && is_object($animal)){
            $nombre = $animal->getTipo()." - Raza: ".$animal->getRaza();
            $em->remove($animal);
            $em->flush();

            $message = 'Borrado: '.$nombre;
        }else{
            $message = 'Fail delete: El animal no existe en la DB'; 
        }
        
        return new Response($message);
    }
}
