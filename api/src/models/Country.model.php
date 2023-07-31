<?php

class Country implements JsonSerializable {

    private $id; // PK -> TINYINT(3)
    private $name; // VARCHAR(30)
    private $abbreviation; // CHAR(2)

    public function __construct($id, $name, $abbreviation) {
        $this->id = $id;
        $this->name = $name;
        $this->abbreviation = $abbreviation;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAbbreviation() {
        return $this->abbreviation;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
