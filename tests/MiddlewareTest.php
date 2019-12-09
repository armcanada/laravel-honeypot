<?php

namespace Armcanada\LaravelHoneypot\Tests;

use Armcanada\LaravelHoneypot\Tests\TestCase;
use Illuminate\Http\Request;
use Armcanada\LaravelHoneypot\Http\Middleware\VerifyHoneypot;
use Illuminate\Support\Facades\Route;

class MiddlewareTest extends TestCase
{

    protected function setUp() : void
    {
        parent::setUp();

        Route::post('test', function() {
            return 'ok';
        })->middleware('verify-honeypot');
    }

    /** @test */
    public function it_should_pass_when_no_honeypot_is_defined()
    {
        $this->post('test')->assertSee('ok');
    }

    /** @test */
    public function it_passes_through_middleware_when_honeypot_is_not_set()
    {
        $request = new Request;

        $middleware = new VerifyHoneypot;

        $response = $middleware->handle($request, function($r) {});

        $this->assertEquals($response, null);
    }

    /** @test */
    public function it_is_properly_used_by_route()
    {
        $this->post('test')->assertSee('ok');
    }

    /** @test */
    public function it_should_fail_when_honeypot_is_filled()
    {
        Route::post('test/with_parameters', function() {
            return 'ok';
        })->middleware('verify-honeypot:test');

        $this->post('test/with_parameters', ['test' => '1123'])->assertSee('');
    }

    /** @test */
    public function it_should_pass_when_honeypot_is_not_filled()
    {
        Route::post('test/with_parameters', function() {
            return 'ok';
        })->middleware('verify-honeypot:test');

        $this->post('test/with_parameters', ['test' => ''])->assertSee('ok');
    }
}
