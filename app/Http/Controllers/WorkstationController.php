<?php

namespace App\Http\Controllers;

use App\Models\Workstation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkstationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $workstations = Workstation::all();
        return view('workstations.index', compact('workstations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('workstations.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $workstation = Workstation::findOrFail($id);
        return view('workstations.edit', compact('workstation'));
    }
}
