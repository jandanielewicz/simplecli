<?php

namespace Cli;

use App\Controllers\CommandController;
use Cli\Command\CommandRegistry;

class App
{
    public CommandRegistry $commandRegistry;
    public Printer $printer;

    public function __construct()
    {
        $this->commandRegistry = new CommandRegistry();
        $this->printer = new Printer();
    }

    public function getPrinter()
    {
        return $this->printer;
    }

    public function registerController($name, CommandController $controller)
    {
        $this->commandRegistry->registerController($name, $controller);
    }

    public function runCommand(array $argv = [])
    {
        if (isset($argv[1])) {
            $commandName = $argv[1];
        }

        if (empty($commandName)) {
            $this->getPrinter()->display("ERROR: No command name given. Choose from: " . implode(', ', array_keys($this->commandRegistry ->getControllersNames())));
            return false;
        }

        try {
            call_user_func($this->commandRegistry->getCallable($commandName), $argv);
        } catch (\Exception $e) {
            $this->getPrinter()->display("ERROR: " . $e->getMessage());
            exit;
        }
    }
}
