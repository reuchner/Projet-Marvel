<?php

  class Model {

    private $database; // stockage de la database en variable
    private $pdo; //pour pouvoir utiliser la méthode PDO dans toutes nos fonctions. Variable lié à la connexion BDD
    private $table; // stockage de la table
    // on crée un model pour chaque table

    function __construct(){
        $pdo = new PDO("mysql:dbname=".BDDDATABASE.";host=".BDDHOST, BDDUSER, BDDPASS);
        $this->database = $bdd;
        $this->pdo = $pdo;
    }

    public function create($champs, $valeu){

        $sql = "INSERT INTO `$this->table`(".implode(',', $champs).") VALUES ( ' ".implode("','", $valeu)." ' )";
        // echo $sql;
        $this->pdo->exec($sql);

    }

    public function read($champs, $where ){

        $sql = "SELECT ".implode(',', $champs)." FROM `$this->table` WHERE ".$this->arrayToString( $where );
        // echo $sql;
        $request = $this->pdo->prepare($sql);
        $request->execute();
        $data = $request->fetchAll();
        var_dump($data);
    }

    public function update(){

    }

    public function delete($where){

        $sql = "DELETE FROM `$this->table` WHERE ".$this->arrayToString( $where );
        $this->pdo->exec($sql);

        // echo $sql;

    }

    private function arrayToString( $array ){

        if( !is_array($array) ) // Verification variable is array
            return false;

        $stringRetour = "";

        foreach($array as $key => $val){ // Array("name" => "Toto")
            $stringRetour .= $key." = '".$val."' AND "; //$stringRetour = (name = 'Toto' AND )
        }

        $stringRetour = substr($stringRetour, 0, -4); // Suppression des 4 dernier parametre

        return $stringRetour;


    /***********************  GETTER / SEETER ************************/

    public function setTable($table){
        $this->table = $table;
    }

    public function getTable(){
        return $this->table;
    }

  }
}
