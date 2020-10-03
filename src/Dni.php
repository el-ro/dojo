<?php
declare(strict_types=1);


namespace ElRo\Dojo;


use LengthException;

final class Dni
{
    public function __construct(string $dni)
    {
        if (strlen($dni) > 9) {
            throw new LengthException('Too Long');
        }
        throw new LengthException('Too Short');
    }

}