<?php

namespace App\Controllers;

use Cli\App;

abstract class CommandController
{
    /**
     * @var App
     */
    protected App $application;

    abstract public function index(array $argv): void;

    public function __construct(App $application)
    {
        $this->application = $application;
    }

    protected function getApplication() : App
    {
        return $this->application;
    }
}
