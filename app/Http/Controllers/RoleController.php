<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $counts = \App\Models\User::selectRaw('role, count(*) as total')
            ->groupBy('role')
            ->pluck('total', 'role');

        return view('roles.index', compact('counts'));
    }
}
