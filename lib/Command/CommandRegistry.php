<?php

namespace Cli\Command;

use App\Controllers\CommandController;
use App\Exception\CommandNotFoundException;

class CommandRegistry
{
    /**
     * @var array
     */
    protected $controllers = [];

    /**
     * @param $commandName
     * @param CommandController $controller
     */
    public function registerController($commandName, CommandController $controller)
    {
        $this->controllers[$commandName] = $controller;
    }

    /**
     * @return array
     */
    public function getControllersNames() : array
    {
        return $this->controllers ?? [];
    }

    /**
     * @param $command
     * @return mixed
     */
    public function getController($command)
    {
        return $this->controllers[$command] ?? [];
    }

    /**
     * @param $commandName
     * @return array
     * @throws CommandNotFoundException
     */
    public function getCallable($commandName) : array
    {
        $controller = $this->getController($commandName);

        if (!$controller instanceof CommandController) {
            throw new CommandNotFoundException("Command \"$commandName\" not defined in script");
        }

        return [$controller, 'index'];
    }
}
