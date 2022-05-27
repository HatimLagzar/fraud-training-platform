<?php

namespace App\Services\Domain\Auth;

use App\Models\User;
use App\Services\Domain\Auth\Exceptions\IncorrectCredentialsException;

use function auth;

class LoginService
{
    public function login(string $email, string $password, int $type = User::NORMAL_TYPE): bool
    {
        return auth()->attempt(
            [
                User::EMAIL_COLUMN    => $email,
                User::PASSWORD_COLUMN => $password,
                User::TYPE_COLUMN     => $type,
            ],
            true
        );
    }
}
