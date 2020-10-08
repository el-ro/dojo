<?php
declare(strict_types=1);

namespace Tests\ElRo\Dojo;

use ElRo\Dojo\LuhnValidator;
use PHPUnit\Framework\TestCase;

final class LuhnValidatorTest extends TestCase
{
    public function testShouldValidateAllZeros(): void
    {
        $validator = new LuhnValidator();
        $this->assertTrue($validator->isValid('00000000000'));
    }

    public function testShouldNotValidateAllZerosEndingInOne(): void
    {
        $validator = new LuhnValidator();
        $this->assertFalse($validator->isValid('0000000001'));
    }

    public function testShouldNotValidateOneInThirdPositionFromEnding(): void
    {
        $validator = new LuhnValidator();
        $this->assertFalse($validator->isValid('00000000100'));
    }

    public function testShouldValidateWithTwoNoZerosAddingTen(): void
    {
        $validator = new LuhnValidator();
        $this->assertTrue($validator->isValid('00000000406'));
    }
}
