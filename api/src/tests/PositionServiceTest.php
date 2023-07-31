<?php

use PHPUnit\Framework\TestCase;

class PositionServiceTest extends TestCase {

    private $positionService;
    private $positions;

    public function setUp(): void {
        $this->positionService = PositionService::getInstance();
        $this->positions = $this->positionService->listPositions();
    }

    public function testPositionsNotNull() {
        $this->assertNotNull($this->positions);
    }

    public function testPositionsIsArray() {
        $this->assertIsArray($this->positions);
    }

    public function testPositionsHasElements() {
        $this->assertGreaterThan(0, sizeof($this->positions));
    }

    public function testPositionsAreInstancesOfPositionClass() {
        foreach ($this->positions as $position) {
            $this->assertInstanceOf("Position", $position);
        }
    }

    public function testPositionsHasIntegerIds() {
        foreach ($this->positions as $position) {
            $this->assertIsNumeric($position->getId());
        }
    }
}
