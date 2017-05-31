<?php

namespace TripSorter;


final class Container {

    /**
     * @var array
     */
    static $container = null;

    /**
     * @var array
     */
    private $_services = [];

    private function __construct() {
        $this->_initServices();
    }

    /**
     * @return Container
     */
    public static function getInstance() {
        if (self::$container === null) {
            self::$container = new Container();
        }
        return self::$container;
    }

    /**
     * @param string $serviceName
     * @return mixed
     */
    public function getService($serviceName) {
        if (!array_key_exists($serviceName, $this->_services)) {
            return null;
        }
        return call_user_func($this->_services[$serviceName]);
    }

    /**
     * @param string $serviceName
     * @param callable $serviceConstructor
     */
    public function injectService($serviceName, $serviceConstructor) {
        $this->_services[$serviceName] = $serviceConstructor;
    }

    private function _initServices() {
        $this->_services = [
            "Sorter" => function () {return new Sorter\Service();},
            "Render" => function () {return new Render();},
        ];
    }
}