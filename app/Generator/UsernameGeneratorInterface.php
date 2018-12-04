<?php

namespace App\Generator;

use App\User;

interface UsernameGeneratorInterface
{
    public function generate(User $user);
}
