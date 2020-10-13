<?php

namespace Tests\ElRo\Dojo;

use ElRo\Dojo\LuhnValidator;
use PHPUnit\Framework\TestCase;

final class LuhnValidatorAcceptanceTest extends TestCase
{
    public function testShouldValidateRealCardNumber(): void
    {
        $validator = new LuhnValidator();
        $this->assertTrue($validator->isValid(49927398716));
    }

}
