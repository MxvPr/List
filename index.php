<?php

//Nouvelle session
session_start();

//Connection à la base de données
require 'config/DataBase.php';

//Connection au controller
require './controllers/TaskController.php';

//Controle de la session

$taskController = new TaskController();

// Lance les taches en fonction de l'action fait par l'utilisateur

if(array_key_exists('action',$_GET)){
    switch($_GET['action']){
        case 'add':
            require __DIR__ . "/templates/task/add.phtml";
            break;
        case 'create':
            $taskController->createTask();
            break;
        case 'delete':
            $taskController->deleteTask();
            break;
        case 'update': 
            require __DIR__ . "/templates/task/update.phtml";
            break;
        case'updatetask':
            $task = $taskController->updateTask();
            break;


    }
}else{
    $task = $taskController->getTask();
    require __DIR__ . "/templates/home.phtml";
}
