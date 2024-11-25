<?php

namespace App\Http\Controllers\MarketingManager\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\Auth\MMLogginRequest;

class MMLoginController extends Controller
{
    /**
     * Display the login view.
     */

     
    public function create(): View
    {
        //manager to loggingpage
        return view('marketing.mm-loging');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(MMLogginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('test-auth', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('marketing_manager')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
