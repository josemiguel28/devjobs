<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Transaccion::class);
        return view('transacciones.index');
    }
}
