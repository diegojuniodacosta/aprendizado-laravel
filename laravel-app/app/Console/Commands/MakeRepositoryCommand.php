<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Repository';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        $name = $this->argument('name');
        $modelName = Str::studly($name) . 'Repository'; // Converte o nome para StudlyCase e adiciona 'Repository'
        $namespace = 'App\\Repositories'; // Namespace para os modelos do repositório

        // Chama o comando 'make:model' com o nome do modelo e o namespace
        $this->call('make:model', [
            'name' => $namespace . '\\' . $modelName,
        ]);

    }
}
