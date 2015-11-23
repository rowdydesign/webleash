<?php

namespace App\Http\Controllers\Console;

/**
 * Dashboard Controller
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Controller
 */

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $user = \Auth::user();
        $widgets = $user->getWidgets();

        $viewData = [
            'user' => $user,
            'widgets' => $widgets,
        ];


        return view('console.dashboard.index', $viewData);
    }

}
