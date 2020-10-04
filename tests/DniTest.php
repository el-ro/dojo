<?php
declare(strict_types=1);

namespace Tests\ElRo\Dojo;

use DomainException;
use ElRo\Dojo\Dni;
use InvalidArgumentException;
use LengthException;
use PHPUnit\Framework\TestCase;

final class DniTest extends TestCase
{
    public function testShouldFailWhenDniLongerThanMaxLength(): void
    {
        $this->expectException(LengthException::class);
        $dni = new Dni('0123456789');
    }

    public function testShouldFailWhenDniShorterThanMinLength(): void
    {
        $this->expectException(LengthException::class);
        $dni = new Dni('01234567');
    }

    public function testShouldFailWheDniEndsWithANumber(): void
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Ends with number');
        $dni = new Dni('012345678');
    }

    public function testShouldFailWhenDniEndsWithAnInvalidLetter(): void
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Ends with invalid letter');

        $dni = new Dni('01234567I');
    }
    
   public function testShouldFailWhenDniHasLettersInTheMiddle(): void
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Has letters in the middle');

        $dni = new Dni('012AB567R');
    }

    public function testShouldFailWhenDniStartsWithALetterOtherThanXYZ(): void
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Starts with invalid letter');

        $dni = new Dni('A1234567R');
    }

    public function testShouldFailWhenInvalidDni(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $dni = new Dni('00000000S');
    }

}
