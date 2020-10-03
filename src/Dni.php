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
        $this->checkDniHasValidLength($dni);

        throw new DomainException('Ends with number');
    }

    private function checkDniHasValidLength(string $dni): void
    {
        if (\strlen($dni) !== self::VALID_LENGTH) {
            throw new LengthException( 'Too long or too short');
        }
    }
}