<?php

namespace GridPrinciples\PlaceholderAvatars\Tests;

use GridPrinciples\PlaceholderAvatars\Facades\PlaceholderAvatars;
use GridPrinciples\PlaceholderAvatars\PlaceholderAvatarsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            PlaceholderAvatarsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        PlaceholderAvatars::route('test-avatar');
    }
}
