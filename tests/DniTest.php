<?php
declare(strict_types=1);

namespace Tests\ElRo\Dojo;

use DomainException;
use ElRo\Dojo\Dni;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class DniTest extends TestCase
{
    public function testShouldFailWhenDniLongerThanMaxLength(): void
    {
        $this->expectException(DomainException::class);
        $dni = new Dni('0123456789');
    }

    public function testShouldFailWhenDniShorterThanMinLength(): void
    {
        $this->expectException(DomainException::class);
        $dni = new Dni('01234567');
    }

    public function testShouldFailWheDniEndsWithANumber(): void
    {
        $this->expectException(DomainException::class);
        $dni = new Dni('012345678');
    }

    public function testShouldFailWhenDniEndsWithAnInvalidLetter(): void
    {
        $this->expectException(DomainException::class);
        $dni = new Dni('01234567I');
    }
    
   public function testShouldFailWhenDniHasLettersInTheMiddle(): void
    {
        $this->expectException(DomainException::class);
        $dni = new Dni('012AB567R');
    }

    public function testShouldFailWhenDniStartsWithALetterOtherThanXYZ(): void
    {
        $this->expectException(DomainException::class);
        $dni = new Dni('A1234567R');
    }

    public function testShouldFailWhenInvalidDni(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $dni = new Dni('00000000S');
    }

    public function testShouldConstructValidDniEndingWithT(): void
    {
        $dni = new Dni('00000000T');
        $this->assertEquals('00000000T', (string) $dni);
    }

    public function testShouldConstructValidDniEndingWithR(): void
    {
        $dni = new Dni('00000001R');
        $this->assertEquals('00000001R', (string) $dni);
    }

    public function testShouldConstructValidDniEndingWithW(): void
    {
        $dni = new Dni('00000002W');
        $this->assertEquals('00000002W', (string) $dni);
    }

    public function testShouldConstructValidNieStartingWithX(): void
    {
        $dni = new Dni('Y0000000Z');
        $this->assertEquals('Y0000000Z', (string) $dni);
    }

    public function testShouldConstructValidDniWithLowerCaseLetter(): void
    {
        $dni = new Dni('00000002w');
        $this->assertEquals('00000002W', (string) $dni);
    }
}
