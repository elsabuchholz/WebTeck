<?php

class Storage {

    private $connection;

    /**
    * Konstruktor - Erzeugt ein neues Storage-Objekt
    */
    // public function __construct($name ='_s0544180__differ', $host = 'db.f4.htw-berlin.de', $user = 's0544180', pass = 'WebTeckk')
    public function __construct($name ='differ', $host = 'localhost', $user = 'root', $pass = '') {
        try {
            // $this->connection = new PDO('sqlite:products.db');
            $this->connection = new PDO("mysql:host=$host;dbname=$name;charset=utf8", $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
    * Destruktor - Wickelt das Objekt vor dessen Vernichtung ab
    */
    public function __destruct() {
        $this->connection = null;
    }

    /**
    * Gibt die letzten 20 Einträge im Archiv zurück
    * @return array Liste aus Einträgen mit id, timestamp, name, url, image und price
    */
    public function all() {
        $statement = $this->connection->query('SELECT * FROM differ ORDER BY id DESC LIMIT 0, 20');
       $texte = $statement->fetchAll();
        return $texte;
    }
    
    /**
    * Gibt ein bestimmtes Produkt anhand seiner ID zurück
    * @param array $daten Liste aus name, url, image und price
    */
    public function get($id) {
        $statement = $this->connection->prepare('SELECT * FROM differ WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }

    /**
    * Fügt ein Produkt hinzu.
    * @param array $daten Liste aus name, url, image und price
    */
    public function add(array $daten) {
        $statement = $this->connection->prepare('INSERT INTO differ (id, timestamp, text1, text2, title) VALUES (NULL, CURRENT_TIMESTAMP, ?, ?, ?)');
        
        return $statement->execute($daten);
        
        
    }

    /**
    * Bearbeitet ein bereits vorhandenes Produkt.
    * @param array $daten Liste aus name, url, image und price
    */

    public function edit(array $daten) {
        $statement = $this->connection->prepare('UPDATE products SET name = ?, url = ?, image = ?, price = ? WHERE id = ?');
        return $statement->execute($daten);
    }

    /**
    * Löscht ein Produkt.
    * @param int $id ID
    */
    public function delete($id) {
        $statement = $this->connection->prepare('DELETE FROM products WHERE id = ?');
        return $statement->execute(array($id));
    }

    public function count_visits(){

       $statement = $this->connection->prepare('SELECT id FROM differ'); 
       $statement->execute();
       $visits = $statement->rowCount();
       
       return $visits;
    } 

public function last_id(){
   $id= $this->connection->lastInsertId();
   return $id;
}
public function title_ausgabe(){

       $statement = $this->connection->prepare('SELECT title FROM differ'); 
       $title=$statement->execute();
       return $title;
    } 

}