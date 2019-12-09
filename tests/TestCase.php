<?php
namespace Armcanada\LaravelHoneypot\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithContainer;
use \Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use InteractsWithContainer;

    protected function getPackageProviders($app)
    {
        return ['Armcanada\LaravelHoneypot\LaravelHoneypotServiceProvider'];
    }
}