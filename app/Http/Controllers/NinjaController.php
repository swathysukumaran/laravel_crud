<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ninja;

class NinjaController extends Controller
{
    public function index()
    {
        $ninjas = Ninja::orderBy('createdAt', 'desc')->get();
        return view('ninjas.index', ["ninjas" => $ninjas]);
    }
    public function create()
    {
        return view('ninjas.create');
    }

    public function show($id)
    {
        $ninja = Ninja::findOrFail($id);
        return view('ninjas.show', ["ninja" => $ninja]);
    }
}
