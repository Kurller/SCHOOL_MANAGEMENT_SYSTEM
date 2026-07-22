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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

$role = $user->role?->name;

return match ($role) {
    'Admin' => redirect()->route('dashboard'),
    'Principal' => redirect()->route('dashboard'),
    'Teacher' => redirect()->route('results.index'),
    'Student' => redirect()->route('student.dashboard'),
    'Parent' => redirect()->route('parent.dashboard'),
    'Accountant' => redirect()->route('fees.index'),
    default => redirect()->route('dashboard'),
};
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
