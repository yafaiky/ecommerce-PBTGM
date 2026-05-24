<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Tampilkan halaman User Dashboard.
     */
    public function dashboard(): View
    {
        return view('users.users');
    }
}
