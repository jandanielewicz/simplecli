<?php

namespace App\Controllers;


class CliActionController extends CommandController
{
    /**
     * @param array $argv
     * @throws \Exception
     */
    public function index(array $argv): void
    {
        $class = $argv[1] ?? "";
        $methodName = $argv[2] ?? "";
        $optional = $argv[3] ?? "";
        $classPath = "\App\Entities" . '\\' . ucfirst($class);

        $class = new $classPath();

        if (!empty($methodName) && method_exists($class, $methodName)) {
            $this->getApplication()->getPrinter()->display($class->{$methodName}($optional));
        } elseif (empty($methodName)) {
            throw new \Exception('No given method');
        } else {
            throw new \Exception('This method is not allowed');
        }
    }
}
