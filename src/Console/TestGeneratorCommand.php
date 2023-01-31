<?php

namespace TomatoPHP\TomatoDusk\Console;

use Illuminate\Console\Command;
use TomatoPHP\TomatoDusk\Services\ComponentGenerator\TestGenerator;

class TestGeneratorCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tomato:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make dusk test file inside Tests folder';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Please input your test name? (ex: UserLogin)');
        while(!$name){
            $this->error('Name is required');
            $name = $this->ask('Please input your test name? (ex: UserLogin)');
        }

        $modelGenerator = new TestGenerator(name: $name);
        $modelGenerator->generate();

        $this->info('🍅 The Tests Has Been Generated');
        $this->info('🍅 Please Register The Test Class on the tomato-dusk.php config file to run it');
    }
}
