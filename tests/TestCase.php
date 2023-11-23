<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestCase extends Orchestra
{
    protected array $migrations = [
        'create_pages_table.php.stub',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Workup\\Core\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        foreach ($this->migrations as $migration) {
            (include __DIR__ . "/database/migrations/$migration")->up();
        }
    }
}
