<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Redirect user ke dashboard yang sesuai berdasarkan role.
     */
    public function index(Request $request): RedirectResponse
    {
        $user = $request->user();

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            default => redirect()->route('user.dashboard'),
        };
    }
}
