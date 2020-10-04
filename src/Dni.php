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
        if (!preg_match('/^[XYZ\d]\d{7}[^UIOÑ\d]$/u', $dni)) {
            throw new DomainException('Bad format');
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