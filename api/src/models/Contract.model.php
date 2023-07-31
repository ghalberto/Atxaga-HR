<?php

class Contract implements JsonSerializable {

    private $id; // CHAR(50)
    private $person; // FK -> CHAR(36)
    private $position; // FK -> TINYINT(2)
    private $start; // DATE
    private $end; // DATE
    private $fixedSalary; // DECIMAL(7,2)
    private $active; // TINYINT(1)

    public function __construct($id, $person, $position, $start, $end, $fixedSalary, $active) {
        $this->id = $id;
        $this->person = $person;
        $this->position = $position;
        $this->start = $start;
        $this->end = $end;
        $this->fixedSalary = $fixedSalary;
        $this->active = $active;
    }

    public function getId() {
        return $this->id;
    }

    public function getPerson() {
        return $this->person;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getStart() {
        return $this->start;
    }

    public function getEnd() {
        return $this->end;
    }

    public function getFixedSalary() {
        return $this->fixedSalary;
    }

    public function getActive() {
        return $this->active;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
