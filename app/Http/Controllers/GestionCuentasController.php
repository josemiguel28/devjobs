<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class GestionCuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Policies/UserPolicy.php
        Gate::authorize('viewAny', auth()->user());

        return view ('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('update', $user);

        return view('users.edit', compact('user'));
    }
}
