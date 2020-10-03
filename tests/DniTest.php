<?php
declare(strict_types=1);

namespace Tests\ElRo\Dojo;

use DomainException;
use ElRo\Dojo\Dni;
use LengthException;
use PHPUnit\Framework\TestCase;

final class DniTest extends TestCase
{
    public function testShouldFailWhenDniLongerThanMaxLength(): void
    {
        $this->expectException(LengthException::class);
        $this->expectExceptionMessage('Too Long');
        $dni = new Dni('0123456789');
    }

    public function testShouldFailWhenDniShorterThanMinLength(): void
    {
        $this->expectException(LengthException::class);
        $this->expectExceptionMessage('Too Short');
        $dni = new Dni('01234567');
    }

    public function testShouldFailWheDniEndsWithANumber(): void
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Ends with number');
        $dni = new Dni('012345678');
    }
}
