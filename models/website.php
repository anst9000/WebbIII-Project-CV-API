<?php
class Website
{

    // database connection and table title
    private $conn;
    private $table = "webiii_websites";

    // object properties
    public $id;
    public $title;
    public $url;
    public $description;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read products
    public function read()
    {
        // select all query
        $query = "SELECT * FROM " . $this->table;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Post
    public function read_single()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->table .
            ' WHERE id = ?';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Bind ID
        $stmt->bindParam(1, $this->id);
        // Execute query
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            $this->title = $row['title'];
            $this->url = $row['url'];
            $this->description = $row['description'];
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET title = :title, url = :url, description = :description';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->url = htmlspecialchars(strip_tags($this->url));
        $this->description = htmlspecialchars(strip_tags($this->description));
        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':url', $this->url);
        $stmt->bindParam(':description', $this->description);
        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Update Post
    public function update()
    {
        // Create query
        $query = 'UPDATE ' . $this->table . '
        SET title = :title,
            url = :url,
            description = :description
        WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->url = htmlspecialchars(strip_tags($this->url));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':url', $this->url);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Delete Post
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
