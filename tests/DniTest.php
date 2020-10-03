<?php
declare(strict_types=1);

namespace Tests\ElRo\Dojo;

use ElRo\Dojo\Dni;
use LengthException;
use PHPUnit\Framework\TestCase;

final class DniTest extends TestCase
{
    public function testShouldFailWhenDniLongerThanMaxLength()
    {
        $this->expectException(LengthException::class);
        $this->expectExceptionMessage('Too Long');
        $dni = new Dni('0123456789');
    }

    public function testShouldFailWhenDniShorterThanMinLength()
    {
        $this->expectException(LengthException::class);
        $this->expectExceptionMessage('Too Short');
        $dni = new Dni('01234567');
    }
}
