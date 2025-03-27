<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $produtos = Produto::where('status', 'ativo')
            ->latest()
            ->paginate(12);

        return view('home', compact('produtos'));
    }
} 