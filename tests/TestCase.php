<?php

namespace ProtoneMedia\LaravelFormComponents\Tests;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\BrowserKit\TestCase as BaseTestCase;
use ProtoneMedia\LaravelFormComponents\Support\ServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected $baseUrl = 'http://localhost';

    public function setUp(): void
    {
        parent::setUp();

        $this->app['config']->set('app.key', 'base64:yWa/ByhLC/GUvfToOuaPD7zDwB64qkc/QkaQOrT5IpE=');

        $this->app['config']->set('form-components.framework', env('FORM_COMPONENTS_FRAMEWORK', 'tailwind'));

        View::addLocation(__DIR__ . '/Feature/views');
    }

    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class, LivewireServiceProvider::class];
    }

    protected function registerTestRoute($uri, callable $post = null): self
    {
        Route::middleware('web')->group(function () use ($uri, $post) {
            Route::view($uri, $uri);

            if ($post) {
                Route::post($uri, $post);
            }
        });

        return $this;
    }
}
