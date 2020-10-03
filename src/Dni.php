<?php
declare(strict_types=1);


namespace ElRo\Dojo;


use DomainException;
use LengthException;

final class Dni
{
    private const VALID_LENGTH = 9;
    public function __construct(string $dni)
    {
        if (\strlen($dni) !== self::VALID_LENGTH) {
            throw new LengthException(
                \strlen($dni) > 9 ? 'Too Long' : 'Too Short');
        }

        throw new DomainException('Ends with number');
    }
}