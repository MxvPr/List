<?php

class Task{
    
    private $database;
    private $bdd;

    public function __construct()
    {
        $this->database = new Database();
        $this->bdd = $this->database->getBdd();
    }

    //ajouter tache
    public function add($task_nom,$task_date,$task_categorie){
        $query = $this->bdd->prepare("INSERT INTO task(task_nom,task_date,task_categorie) VALUES (?,?,?)");
        try{
            $add = $query->execute([$task_nom,$task_date,$task_categorie]);
            return $add;
        }catch(Exception $e){
            print_r($e);
        }
    }
    
    //prendre toutes les taches

    public function getAll(){
        $query = $this->bdd->prepare("SELECT * FROM task");
        try{
            $query->execute();
            $task = $query->fetchAll();
            return $task;
        }catch(Exception $e){
            print_r($e);
        }
    }

    //supprimer tache

    public function delete($id){
        $query = $this->bdd->prepare("DELETE FROM task WHERE task_id = ?");
        try{
            $query->execute([$id]);
            return $query;
        }catch(Exception $e){
            print_r($e);
        }
    }

    //mettre à jour tache

    public function update($id,$task_nom,$task_date,$task_categorie){
        $query = $this->bdd->prepare("UPDATE task SET task_nom = ?, task_date = ?, task_categorie = ? WHERE task_id = ?");
        try{
            $query->execute([$task_nom,$task_date,$task_categorie,$id]);
        }catch(Exception $e){
            print_r($e);
        }
    }

    public function getSingleTask($id){
        $query = $this->bdd->prepare("SELECT task_id,task_nom,task_date,task_categorie FROM task WHERE task_id = ?");
        $query->execute([$id]);
        $task = $query -> fetch();
        return $task;
    }

}