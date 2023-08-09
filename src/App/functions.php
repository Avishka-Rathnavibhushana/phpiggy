<?php

declare(strict_types=1);

function dd(mixed $data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die(); // For optimizatoin
}
