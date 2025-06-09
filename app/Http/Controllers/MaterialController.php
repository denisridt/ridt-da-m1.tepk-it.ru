<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use App\Models\MaterialType;
use App\Models\Unit;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        foreach ($materials as $material) {
            $material->quantity = $material->product->sum('quantity');
        }
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        $materialTypes = MaterialType::all();
        $units = Unit::all();
        return view('materials.create', compact('units', 'materialTypes'));
    }

    public function store(MaterialRequest $request)
    {
        $material = Material::create($request->validated());
        return redirect()->route('materials.index');
    }
    public function edit(Material $material)
    {
        $materialTypes = MaterialType::all();
        $units = Unit::all();
        return view('materials.edit', compact('material','materialTypes', 'units',));
    }
    public function update(MaterialRequest $request, Material $material)
    {
        $material->update($request->validated());

        return redirect()->route('materials.index');
    }
    public function show($id){
        $material = Material::with('product.product')->findOrFail($id);
        $products = $material->product->map(function ($materialProduct){
           return[
                'name' => $materialProduct->product->name,
               'quantity' => $materialProduct->quantity,
           ];
        });
    }
}

