<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\User;
use App\Form\RegisterType;

// 470. Guardar el usuario registrado
// proyecto-symfony\config\packages\security.yaml
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

// 475. Login de usuarios
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


// Editar
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;

// Abriendo una sesion: Intento I
// use Symfony\Component\HttpFoundation\RequestStack;
// use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;


// 468. Probando entidades relacionadas
// http://proyecto-symfony.com.devel/user

// 469. Formulario de Registro
// http://proyecto-symfony.com.devel/registro

// 470. Guardar el usuario registrado
// 471. Validar formulario de registro

class UserController extends AbstractController {

    public function register(Request $request, UserPasswordEncoderInterface $encoder): Response {
        
        // Crear el formulario
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        
        
        // Rellenar el objeto con los datos del formulario
        $form->handleRequest($request);
        
        
        // Comprobar si el form se ha enviado
        // 471. Validar formulario de registro: $form->isValid()
        if($form->isSubmitted() && $form->isValid()){
            // var_dump($user); 
            // Modificando el objeto para guardarlo           
            $user->setRole('ROLE_USER');
            $user->setCreatedAt(new \DateTime('now'));
            
            // Cifrar la contrasena
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            
            //var_dump($user);
            // Guardar usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('tasks');
        }
        
        
        return $this->render('user/register.html.twig', [
               'form' => $form->createView()
        ]);
    }
    
    
    // Editar el formulario
    public function edit(Request $request, UserInterface $user, UserPasswordEncoderInterface $encoder) {
        if (!$user) {
            return $this->redirectToRoute('tasks');
            // redirectToRoute del routes.yaml, es decir, me lleva al index
        }
        
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            // Coger la password sin hashear
            // $pw = $user->getPassword();
            
            // Cifrar la contrasena
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            
            // Entity manager
            $em = $this->getDoctrine()->getManager();
            // Persisto el objeto 
            $em->persist($user);
            // Guardo en la DB
            $em->flush();
            
            return $this->redirect($this->generateUrl('register_detail', [
                'id' => $user->getId(),
            ]));
            
            
        }

        return $this->render('user/register.html.twig', [
            'edit' => true,
            'form' => $form->createView()
        ]);
    }
    
    public function detail(User $user){
	if(!$user){
            return $this->redirectToRout('tasks');
        }
		
        // Pasar una sesion a twig
        $session = new Session();
        $session->clear();
        $session->start();
        
        $session->set('name', $user->getName());
        $session->set('surname', $user->getSurname());
        $session->set('id', $user->getId());
        
        $name = $session->get('name');
        $surname = $session->get('surname');
        $id = $session->get('id');
        
        
	return $this->render('user/detail.html.twig',[
            'user' => $user,
            'name' => $name,
            'surname' => $surname,
            'id'   => $id,
                
            //'pw' => $user->getPassword()
        ]);
    }
    
    
    
    // 475. Login de usuarios
    public function login(AuthenticationUtils $AuthenticationUtils){
        $error = $AuthenticationUtils->getLastAuthenticationError();
        
        $lastUsername = $AuthenticationUtils->getLastUsername();
        
        
        // Abriendo una sesion: intento I
        /*
        $session = $this->requestStack->getSession();
        $session->set('session_user', $user->getName());
        */
        
        return $this->render('user/login.html.twig', array(
            'error' => $error,
            'last_username' => $lastUsername,
        ));
    }
        

    // Session
    /*
    public function __construct(SessionInterface $session){
        $this->session = $session;
    }
    */
    
}
