<?php

namespace TomatoPHP\TomatoDusk\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use ProtoneMedia\Splade\Facades\Toast;
use TomatoPHP\TomatoDusk\Models\TestLog;

class DuskTestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function start(): \Illuminate\Http\RedirectResponse
    {
        if(is_developer()){
            $classes = config('tomato-dusk.classes');

            foreach($classes as $item){
                $item::make('web')->run();
            }

            Toast::success(__('Dusk Testing Run Success'))->autoDismiss(2);
            return back();
        }

        return developer_redirect();

    }

    public function clear(): \Illuminate\Http\RedirectResponse
    {
        if(is_developer()) {
            TestLog::truncate();

            Toast::success(__('Your Log Has Been Cleared'))->autoDismiss(2);
            return back();
        }

        return developer_redirect();
    }
}
