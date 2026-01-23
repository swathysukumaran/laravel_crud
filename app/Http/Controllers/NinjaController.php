<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ninja;
use App\Models\Dojo;

class NinjaController extends Controller
{
    public function index()
    {
        $ninjas = Ninja::with('dojo')->orderBy('createdAt', 'desc')->paginate(10);
        return view('ninjas.index', ["ninjas" => $ninjas]);
    }
    public function create()
    {
        $dojos = Dojo::all();
        return view('ninjas.create', ["dojos" => $dojos]);
    }

    public function show($id)
    {
        $ninja = Ninja::with('dojo')->findOrFail($id);
        return view('ninjas.show', ["ninja" => $ninja]);
    }
}
