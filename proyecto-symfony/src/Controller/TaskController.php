<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Task;
use App\Entity\User;

// Igual hay que hacer symfony server:start 
// cd F:
// cd F:\wamp64-2\www\master-php\proyecto-symfony

// 480. Método crear tareas
use Symfony\Component\HttpFoundation\Request;

// 481. Crear tareas
use App\Form\TaskType;
use Symfony\Component\Security\Core\User\UserInterface;

// 468. Probando entidades relacionadas
// 477. Listado de tareas
// http://proyecto-symfony.com.devel/tasks

class TaskController extends AbstractController {

    // Esta ruta no va pero en este controlador hay funciones que 
    // redireccionan a tasks...
    
    /**
     * @Route("/tasks", name="tasks")
     */
    public function index() {
        
        // Prueba de entidades y relaciones
        
        // echo "<h2>Prueba de entidades y relaciones</h2>";
        $em = $this->getDoctrine()->getManager();
        $task_repo = $this->getDoctrine()->getRepository(Task::class);
        $tasks = $task_repo->findBy([],['id' => 'DESC']);
        
        /*
        $tasks = $task_repo->findAll();
        foreach($tasks as $task){
            echo $task->getUser()->getEmail().': '.$task->getTitle()."<br/>";
        }

        echo "<hr>";
        */
        
        
        // Sacar todos los usuarios de la DB y las tareas adjuntas
        
        /*
        echo "<h2>Sacar todos los usuarios de la DB y las tareas adjuntas</h2>";
        $user_repo = $this->getDoctrine()->getManager()->getRepository(User::class);
        $users = $user_repo->findAll();
        foreach($users as $user){
            echo "<h4>{$user->getName()} {$user->getSurname()}</h4>";
            
            foreach($user->getTasks() as $task){
                echo $task->getTitle().'<br/>';
            }
        }
        echo "<hr>";
        */
        
        return $this->render('task/index.html.twig', [
                    'tasks' => $tasks,
        ]);
    }
    
    public function detail(Task $task){
	if(!$task){
            return $this->redirectToRoute('tasks');
        }
		
	return $this->render('task/detail.html.twig',[
            'task' => $task
        ]);
    }
    
    
    // 480. Método crear tareas
    // 481. Crear tareas
    // http://proyecto-symfony.com.devel/crear-tarea
    public function creation(Request $request, UserInterface $user) {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //var_dump($task);
            $task->setCreatedAt(new \Datetime('now'));
            //var_dump($user);
            $task->setUser($user);
            //var_dump($task);
            
            // Entity manager
            $em = $this->getDoctrine()->getManager();
            // Persisto el objeto
            $em->persist($task);
            // Guardo en la DB
            $em->flush();

            return $this->redirect($this->generateUrl('task_detail', ['id' => $task->getId()]));
        }

        return $this->render('task/creation.html.twig', [
                    'form' => $form->createView()
        ]);
    }
    
    
    // 483. Mis tareas
    public function myTasks(UserInterface $user) {
        $tasks = $user->getTasks();

        return $this->render('task/my-tasks.html.twig', [
                    'tasks' => $tasks
        ]);
    }
    
    
    // 484. Edición de tareas
    public function edit(Request $request, UserInterface $user, Task $task) {
        // Comprobamos is hay usuario y si somos el usuario que ha creado la tarea
        if (!$user || $user->getId() != $task->getUser()->getId()) {
            return $this->redirectToRoute('tasks');
            // redirectToRoute del routes.yaml, es decir, me lleva al index
        }

        // Al pasarle el objeto $task directamente me pinta el formulario al editar
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$task->setCreatedAt(new \Datetime('now'));
            //$task->setUser($user);

            // Entity manager
            $em = $this->getDoctrine()->getManager();
            // Persisto el objeto 
            $em->persist($task);
            // Guardo en la DB
            $em->flush();

            return $this->redirect($this->generateUrl('task_detail', ['id' => $task->getId()]));
        }

        return $this->render('task/creation.html.twig', [
                    'edit' => true,
                    'form' => $form->createView()
        ]);
    }

    
    // 485. Borrado de tareas
    public function delete(UserInterface $user, Task $task) {
        // Comprobamos is hay usuario y si somos el usuario que ha creado la tarea
        if (!$user || $user->getId() != $task->getUser()->getId()) {
            return $this->redirectToRoute('tasks');
            // redirectToRoute del routes.yaml, es decir, me lleva al index
        }

        if (!$task) {
            return $this->redirectToRout('tasks');
        }

        // Entity manager
        $em = $this->getDoctrine()->getManager();
        // Remuevo el objeto de Doctrine
        $em->remove($task);
        // Remuevo el objeto de la DB
        $em->flush();
        

        return $this->redirectToRoute('tasks');
    }

}
