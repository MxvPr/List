<?php

require 'models/task.php';

// créer une classe TaskController qui étend la classe Task
class TaskController extends Task{
    private $task;

    public function __construct()
    {
        parent::__construct();
        $this->task = new Task();
    }

    // fonction pour la création de la task
    public function createTask(){
         
        $task_nom = $_POST['task_nom'];
        $filter_nom = filter_var($task_nom,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $task_date = $_POST['task_date'];
        $task_categorie = $_POST['task_categorie'];
        
        $this->task->add($filter_nom,$task_date,$task_categorie);
        header('Location: http://localhost:4444/');
    }

    // fait une fonction getTask qui retourne une liste de toutes les tâches dans la base de données à partir de la tâche table

    public function getTask(){
        $task = $this->task->getAll();
        return $task;
    }

    // fait une fonction deleteTask qui supprime une tâche de la base de données

    public function deleteTask(){
        echo "delete";
        $id = $_GET['id'];
        $this->task->delete($id);
        if($id > "0") {
            header('Location: http://localhost:4444/');
            
      }
    }

    // fait une fonction updateTask qui met à jour une tâche à partir de la base de données

    public function updateTask(){
        if(isset($_GET ['id'])){


            $task = $this->task->getSingleTask($_GET ['id']);
            if(isset($_POST) && !empty($_POST)) {
                $id = $_GET['id'];
                $task_nom = $_POST['task_nom'];
                $task_date = $_POST['task_date'];
                $task_categorie = $_POST['task_categorie'];
                $this->task->update($id,$task_nom,$task_date,$task_categorie);
                header('Location: http://localhost:4444/');
            }
        } 
    }


    
}