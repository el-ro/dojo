<?php
declare(strict_types=1);


namespace ElRo\Dojo;


use LengthException;

final class Dni
{
    public function __construct()
    {
        throw new LengthException('Too Long');
    }

}