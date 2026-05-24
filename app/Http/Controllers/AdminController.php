<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman Admin Dashboard.
     */
    public function dashboard(): View
    {
        return view('admin.dashboard');
    }
}
