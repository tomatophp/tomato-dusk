<?php

namespace TomatoPHP\TomatoDusk\Services\Components;

use TomatoPHP\TomatoDusk\Models\TestLog;

class Log
{
    public ?string $name = 'web';
    public ?string $type = 'success';

    public static function make(string $name):self
    {
        return (new self())->name($name);
    }

    public function save(): void
    {
        $newLog = new TestLog();
        $newLog->log = $this->name;
        $newLog->type = $this->type ?: 'success';
        $newLog->save();
    }

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function type(string $type): self
    {
        $this->type = $type;
        return $this;
    }
}
