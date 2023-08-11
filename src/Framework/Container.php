<?php

declare(strict_types=1);

namespace Framework;

class Container
{
    private array $definitions = [];

    public function addDefinitions(array $newDefinitions)
    {
        $this->definitions = [...$this->definitions, ...$newDefinitions]; // can user array_merge function as well but this method is faster
        dd($newDefinitions);
    }
}
