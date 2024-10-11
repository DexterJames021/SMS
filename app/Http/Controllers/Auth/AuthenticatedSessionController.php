<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
          // Check if the user is authenticated
          if (Auth::check()) {
            // Optionally check if user is admin or student
            if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'student') {
                // Show 'already logged in' page with logout option
                return view('auth.already-login');
            }
        }
        
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
        public function store(LoginRequest $request): RedirectResponse
        {
            $request->authenticate();

            $request->session()->regenerate();

            if($request->user()->usertype == 'admin'){
                return redirect()->route('admin.index');
            }


            return redirect()->intended('dashboard');
        }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
