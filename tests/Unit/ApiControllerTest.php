<?php

namespace Tests\Unit;

use http\Env\Request;
use PHPUnit\Framework\TestCase;

class ApiControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testIncludeWhenParameterIsNotProvided(): void
    {
        $request = Request::create('/')
        $this->assertTrue(true);
    }
}
