<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
    
            if ($products->isEmpty()) {
                return response()->json([
                    'message' => 'No hay productos disponibles.'
                ], 404);
            }
    
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al obtener los productos.',
                'details' => $e->getMessage()
            ], 500);
        }        
    }

    public function store(Request $request)
    {
        try 
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:30',
                'price' => 'required|numeric|min:0',
                'description' => 'required|string|max:150'
            ]);
    
            $product = Product::create($validatedData);
            return response()->json($product, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al crear el producto.',
                'details' => $e->getMessage()
            ], 500);
        }
    } 
    
    public function show($id)
    {
        
        try {
            $product = Product::findOrFail($id);
    
            return response()->json($product, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Producto no encontrado'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al obtener el producto.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            // Primero buscamos el producto
            $product = Product::findOrFail($id);
            
            // Validamos los datos con las mismas reglas que store()
            $validatedData = $request->validate([
                'name' => 'required|string|max:30',
                'price' => 'required|numeric|min:0',
                'description' => 'required|string|max:150'
            ]);
            
            // Actualizamos solo los campos validados
            $product->update($validatedData);
            
            return response()->json([
                'message' => 'Producto actualizado exitosamente',
                'product' => $product
            ], 200);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Producto no encontrado'
            ], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al actualizar el producto.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }


}
