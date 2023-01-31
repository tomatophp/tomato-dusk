<?php


namespace TomatoPHP\TomatoDusk\Services\ComponentGenerator;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use TomatoPHP\ConsoleHelpers\Traits\HandleStub;

class TestGenerator
{
    use HandleStub;

    public function __construct(
        public string $name,
    )
    {}

    /**
     * @return void
     */
    public function generate(): void
    {
        $this->generateStubs(
            __DIR__ . '/../../../stubs/Test.stub',
            base_path('tests/Browser/Tomato') . '/' . Str::ucfirst(Str::singular($this->name)) . 'Test.php',
            [
                "name" => Str::ucfirst(Str::singular($this->name)),
            ],
            [
                base_path('tests'),
                base_path('tests/Browser'),
                base_path('tests/Browser/Tomato'),
            ]
        );
    }
}
