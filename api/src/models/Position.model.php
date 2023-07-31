<?php

class Position implements JsonSerializable {

    private $id; // PK -> TINYINT(2)
    private $name; // VARCHAR(50)
    private $basicHourlyPay; // DECIMAL(5,2)
    private $active; // TINYINT(1)

    public function __construct($id, $name, $basicHourlyPay, $active) {
        $this->id = $id;
        $this->name = $name;
        $this->basicHourlyPay = $basicHourlyPay;
        $this->active = $active;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getBasicHourlyPay() {
        return $this->basicHourlyPay;
    }

    public function getActive() {
        return $this->active;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
