<?php

declare(strict_types=1);

function dd(mixed $data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die(); // For optimizatoin
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value);
}

function redirectTo(string $path)
{
    header(("Location: {$path}"));
    http_response_code(302);
    exit;
}
