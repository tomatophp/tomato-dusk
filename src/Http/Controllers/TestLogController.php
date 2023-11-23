<?php

namespace TomatoPHP\TomatoDusk\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoDusk\Http\Requests\TestLog\TestLogStoreRequest;
use TomatoPHP\TomatoDusk\Http\Requests\TestLog\TestLogUpdateRequest;
use TomatoPHP\TomatoDusk\Models\TestLog;
use TomatoPHP\TomatoDusk\Tables\TestLogTable;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class TestLogController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        if(is_developer()){
            return Tomato::index(
                request: $request,
                model: TestLog::class,
                view: 'tomato-dusk::test-logs.index',
                table: TestLogTable::class,
            );
        }

        return developer_redirect();
    }


    /**
     * @param TestLog $model
     * @return View
     */
    public function show(TestLog $model): View
    {
        if(is_developer()) {
            return Tomato::get(
                model: $model,
                view: 'tomato-dusk::test-logs.show',
            );
        }

        return developer_redirect();
    }


    /**
     * @param TestLog $model
     * @return RedirectResponse
     */
    public function destroy(TestLog $model): RedirectResponse
    {
        if(is_developer()) {
            $response = Tomato::destroy(
                model: $model,
                message: 'TestLog deleted successfully',
                redirect: 'admin.test-logs.index',
            );

            return $response->redirect;
        }

        return developer_redirect();
    }
}
