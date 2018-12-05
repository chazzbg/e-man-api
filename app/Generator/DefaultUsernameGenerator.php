<?php

namespace App\Generator;

class DefaultUsernameGenerator implements UsernameGeneratorInterface
{

    public function generate(array  $data)
    {
        return preg_replace('/\W+/', '_', $data['email']);
    }
}
