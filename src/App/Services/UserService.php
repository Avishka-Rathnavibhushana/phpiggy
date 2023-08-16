<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService
{
    public function __construct(private Database $db)
    {
    }

    public function isEmailTaken(string $email)
    {
        $emailCount = $this->db->query(
            'SELECT COUNT(*) FROM users WHERE email = :email',
            ['email' => $email]
        )->count();

        if ($emailCount > 0) {
            return throw new ValidationException(['email' => 'Email is already taken']);
        }
    }

    public function create(array $form)
    {
        $this->db->query(
            "INSERT INTO users(email,password,age,country,social_media_url) VALUES(:email, :password, :age, :country, :url)",
            [
                'email' => $form['email'],
                'password' => password_hash($form['password'], PASSWORD_BCRYPT, ['cost' => 12]),
                'age' => $form['age'],
                'country' => $form['country'],
                'url' => $form['socialMediaURL'],
            ]
        );
    }
}
