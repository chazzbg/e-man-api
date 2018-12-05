<?php

namespace App\Generator;


class UsernameGenerator
{
    public static function get(): UsernameGeneratorInterface
    {
        return new DefaultUsernameGenerator();
    }
}

