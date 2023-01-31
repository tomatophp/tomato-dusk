<?php

namespace TomatoPHP\TomatoDusk\Console;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;

class TomatoDuskInstall extends Command
{
    use RunCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tomato-dusk:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install package and publish assets';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Publish Vendor Assets');
        $this->callSilent('optimize:clear');
        $this->call('vendor:publish', ['--provider' => 'TomatoPHP\TomatoDusk\TomatoDuskServiceProvider']);
        $this->artisanCommand(['dusk:install']);
        $this->yarnCommand(['install']);
        $this->yarnCommand(['build']);
        $this->artisanCommand(["migrate"]);
        $this->artisanCommand(["optimize:clear"]);
        $this->info('🍅 Tomato Dusk installed successfully.');
    }
}
