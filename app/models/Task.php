<?php
class Task {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getTasks() {
        $this->db->query('SELECT * FROM tasks');
        $results = $this->db->resultSet();
        return $results;
    }

    public function addTask($data){
        $this->db->query('INSERT INTO tasks (name, beschreibung) VALUES(:name, :beschreibung)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':beschreibung', $data['beschreibung']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updateTask($data){
        $this->db->query('UPDATE tasks SET name = :name, beschreibung = :beschreibung WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':beschreibung', $data['beschreibung']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteTask($id) {
        $this->db->query('DELETE FROM tasks WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getTaskById($id){
        $this->db->query('SELECT * FROM tasks WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}