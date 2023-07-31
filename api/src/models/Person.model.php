<?php

class Person implements JsonSerializable {

    private $id; // PK -> CHAR(36)
    private $lastName; // VARCHAR(50)
    private $firstName; // VARCHAR(30)
    private $birthdate; // DATE
    private $genre; // CHAR(1)
    private $country; // FK -> TINYINT(3)
    private $createdAt; // TIMESTAMP
    private $active; // TINYINT(1)

    public function __construct($id, $lastName, $firstName, $birthdate, $genre, $createdAt, $active) {
        $this->id = $id;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->birthdate = $birthdate;
        $this->genre = $genre;
        $this->createdAt = $createdAt;
        $this->active = $active;
    }

    public function getId() {
        return $this->id;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getActive() {
        return $this->active;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
