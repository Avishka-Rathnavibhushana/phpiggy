<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use App\Exceptions\SessionException;

class SessionMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            throw new SessionException('Session already active.');
        }

        if (headers_sent($file_name, $line)) {
            throw new SessionException("Headers already sent. Consider enabling output buffering. Data outputed from {$file_name} - Line : {$line}");
        }

        session_start();

        $next();

        session_write_close();
    }
}
