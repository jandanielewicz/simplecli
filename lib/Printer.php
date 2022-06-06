<?php

namespace Cli;

class Printer
{
    public function print($message)
    {
        echo $message;
    }

    public function display($message)
    {
        $this->newline();
        $this->print($message);
        $this->newline();
    }

    public function newline()
    {
        $this->print("\n");
    }
}
