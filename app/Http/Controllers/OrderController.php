<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('user', 'tailor')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'tailor_id' => 'required|exists:users,id',
            'description' => 'required',
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'tailor_id' => $request->tailor_id,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return response()->json($order);
    }
}
