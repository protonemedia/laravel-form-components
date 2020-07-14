<?php

namespace ProtoneMedia\LaravelFormComponents\Tests;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Orchestra\Testbench\BrowserKit\TestCase as BaseTestCase;
use ProtoneMedia\LaravelFormComponents\Support\ServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected $baseUrl = 'http://localhost';

    // use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        View::addLocation(__DIR__ . '/Feature/views');
    }

    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function registerTestRoute($uri, callable $post = null)
    {
        Route::middleware('web')->group(function () use ($uri, $post) {
            Route::view($uri, $uri);

            if ($post) {
                Route::post($uri, $post);
            }
        });
    }
}
