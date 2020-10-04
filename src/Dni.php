<?php
declare(strict_types=1);


namespace ElRo\Dojo;


use DomainException;
use InvalidArgumentException;

final class Dni
{
    private const VALID_DNI_PATTERN = '/^[XYZ\d]\d{7}[^UIOÑ\d]$/u';

    public function __construct(string $dni)
    {
        $this->checkIsValidDni($dni);
        throw new InvalidArgumentException('Invalid dni');
    }

    private function checkIsValidDni(string $dni): void
    {
        if (!preg_match(self::VALID_DNI_PATTERN, $dni)) {
            throw new DomainException('Bad format');
        }
    }

}