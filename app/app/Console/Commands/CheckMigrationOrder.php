<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CheckMigrationOrder extends Command
{
    protected $signature = 'migrations:recreate';

    protected $description = 'Recreate migration files in the correct order based on foreign key dependencies';

    public function handle()
    {
        // Get all migration files
        $migrations = $this->getMigrationFiles(database_path('migrations'));

        // Initialize an array to hold migration dependencies
        $dependencies = [];

        foreach ($migrations as $migration) {
            // Get the migration file content
            $content = file_get_contents($migration->getPathname());

            // Extract namespace
            $namespace = $this->getNamespace($migration);

            // Use regular expression to find foreign key dependencies
            preg_match_all("/->references\('(.+?)'\)/", $content, $matches);

            // Store the dependencies in the array
            $dependencies[$namespace . '\\' . $migration->getFilename()] = isset($matches[1]) ? $matches[1] : [];
        }

        // Resolve migration order based on dependencies
        function resolveMigrationOrder($migration, &$orderedMigrations, &$dependencies) {
            if (!in_array($migration, $orderedMigrations)) {
                // Check if $dependencies array has a key corresponding to the current migration
                if (isset($dependencies[$migration])) {
                    foreach ($dependencies[$migration] as $dependency) {
                        resolveMigrationOrder($dependency, $orderedMigrations, $dependencies);
                    }
                }
                $orderedMigrations[] = $migration;
            }
        }

        $orderedMigrations = [];

        // Start resolving order for each migration
        foreach ($migrations as $migration) {
            // Extract namespace
            $namespace = $this->getNamespace($migration);

            resolveMigrationOrder($namespace . '\\' . $migration->getFilename(), $orderedMigrations, $dependencies);
        }

        // Recreate migration files in the correct order
        foreach ($orderedMigrations as $migration) {
            $this->recreateMigrationFile($migration);
        }

        $this->info('Migration files recreated successfully.');
    }

    // Recursively scan directory for migration files
    protected function getMigrationFiles($directory)
    {
        $migrations = collect(File::allFiles($directory));

        foreach (File::directories($directory) as $dir) {
            $migrations = $migrations->merge($this->getMigrationFiles($dir));
        }

        return $migrations;
    }

    // Get namespace of a migration file
    protected function getNamespace($migration)
    {
        $content = file_get_contents($migration->getPathname());
        preg_match('/namespace\s+(.+?);/', $content, $namespaceMatch);
        return $namespaceMatch ? $namespaceMatch[1] : '';
    }

    // Recreate migration file
    protected function recreateMigrationFile($migration)
    {
        // You need to implement this function to recreate the migration file.
        // You can use Laravel's migration generator or custom logic to create the migration file.
        // Example:
        // $content = $this->generateMigrationContent($migration); // Generate content based on existing migration
        // file_put_contents(database_path('migrations/' . $migration . '.php'), $content);
        $this->info("Recreating migration: $migration");
    }
}
