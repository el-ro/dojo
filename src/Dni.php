<?php
declare(strict_types=1);


namespace ElRo\Dojo;


use DomainException;
use InvalidArgumentException;

final class Dni
{
    private const VALID_DNI_PATTERN = '/^[XYZ\d]\d{7}[^UIOÑ\d]$/u';
    private $dni;

    public function __construct(string $dni)
    {
        $this->checkIsValidDni($dni);
        $number = (int) substr($dni,0, -1);
        $letter = substr($dni,-1);
        $mod = $number % 23;
        $map = [
            0 => 'T',
            1 => 'R',
            2 => 'W'
        ];

        if ($letter !== $map[$mod]) {
            throw new InvalidArgumentException('Invalid dni');
        }

        $this->dni = $dni;
    }

    public function __toString(): string
    {
        return $this->dni;
    }

    private function checkIsValidDni(string $dni): void
    {
        if (!preg_match(self::VALID_DNI_PATTERN, $dni)) {
            throw new DomainException('Bad format');
        }
    }

}