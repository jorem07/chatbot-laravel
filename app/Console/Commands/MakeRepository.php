<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';

    protected $description = 'Create a new repository and interface';

    public function handle()
    {
        $name = $this->argument('name');
        $classPath = app_path("Repositories/{$name}.php");

        // Ensure Repositories folder exists
        if (!File::exists(app_path('Repositories'))) {
            File::makeDirectory(app_path('Repositories'));
        }

        if (!File::exists($classPath)) {
            File::put($classPath, "<?php

namespace App\Repositories;

class {$name}
{
    //
}
");
            $this->info("Created: {$name}");
        } else {
            $this->warn("Repository already exists: {$name}");
        }
    }
}
