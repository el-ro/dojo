<?php
declare(strict_types=1);


namespace ElRo\Dojo;


use DomainException;
use InvalidArgumentException;
use LengthException;
use function PHPUnit\Framework\throwException;

final class Dni
{
    private const VALID_LENGTH = 9;
    public function __construct(string $dni)
    {
        $this->checkDniHasValidLength($dni);
        if (preg_match('/\d$/', $dni)) {
            throw new DomainException('Ends with number');
        }
        if (preg_match('/[UÑOI]$/u', $dni)) {
            throw new DomainException('Ends with invalid letter');
        }
        if (!preg_match('/\d{7}.$/', $dni)) {
            throw new DomainException('Has letters in the middle');
        }
        if (!preg_match('/^[XYZ0-9]/', $dni)) {
            throw new DomainException('Starts with invalid letter');
        }
        throw new InvalidArgumentException('Invalid dni');
    }

    private function checkDniHasValidLength(string $dni): void
    {
        if (\strlen($dni) !== self::VALID_LENGTH) {
            throw new LengthException( 'Too long or too short');
        }
    }
}