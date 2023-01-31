<?php

namespace TomatoPHP\TomatoDusk\Console;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;

class TomatoDuskRun extends Command
{
    use RunCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tomato-dusk:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run tomato dusk test cases on your browser';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $classes = config('tomato-dusk.classes');

        foreach($classes as $item){
            $item::make('web')->run();
        }

        $this->info('🍅 Tomato Dusk Is Running 🍅');
    }
}
