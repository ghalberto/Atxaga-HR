<?php

require_once __DIR__ . '/../services/Position.service.php';
require_once __DIR__ . '/../utils/consts.php';
require_once __DIR__ . '/../utils/Logger.php';
require_once __DIR__ . '/../utils/ResponseMethods.php';

class PositionController {

    private $requestMethod;
    private $positionService;

    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct() {
        $this->positionService = PositionService::getInstance();
    }

    public function processRequest() {
        $this->requestMethod = $_SERVER[REQUEST_METHOD];

        if ($this->requestMethod === HTTP_METHOD_GET) {
            $this->getCase();
        } else {
            ResponseMethods::printError(400);
        }
    }

    //HTTP Methods Cases

    private function getCase() {
        $this->listPositions();
    }

    //Private methods

    private function listPositions() {
        try {
            $positions = $this->positionService->listPositions();
            if ((gettype($positions) === 'array') && is_array($positions)) {
                if (sizeof($positions) > 0) {
                    ResponseMethods::printJSON(MESSAGE_CODE_200, $positions);
                } else {
                    ResponseMethods::printJSON(MESSAGE_CODE_404, $positions);
                }
            } else {
                ResponseMethods::printError(500, MESSAGE_CODE_500);
            }
        } catch (Exception $ex) {
            Logger::addToErrorsLog($ex->getMessage());
            ResponseMethods::printError(500, MESSAGE_CODE_500);
        }
    }
}
