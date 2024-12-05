<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::all();
            return response()->json($orders, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error retrieving orders', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'customer' => 'required|string|max:255',
                'product_id' => 'required|exists:products,id',
                'total' => 'required|numeric|min:0',
                'status' => 'required|string|in:pending,completed,cancelled',
            ]);

            $order = Order::create($validatedData);
            return response()->json($order, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'messages' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error creating order', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);
            return response()->json($order, 200);        
        } catch (Exception $e) {
            return response()->json(['error' => 'Error retrieving order', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'customer' => 'sometimes|required|string|max:255',
                'product_id' => 'sometimes|required|exists:products,id',
                'total' => 'sometimes|required|numeric|min:0',
                'status' => 'sometimes|required|string|in:pending,completed,cancelled',
            ]);

            $order = Order::findOrFail($id);
            $order->update($validatedData);

            return response()->json($order, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'messages' => $e->errors()], 422);        
        } catch (Exception $e) {
            return response()->json(['error' => 'Error updating order', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            return response()->json(['message' => 'Order deleted successfully'], 204);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error deleting order', 'message' => $e->getMessage()], 500);
        }
    }
}
