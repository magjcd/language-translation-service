<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use Tests\Auth;
abstract class TestCase extends BaseTestCase
{
    use Auth;
}
