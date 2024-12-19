<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $user = Auth::user();

        // Si es administrador, muestra todas las órdenes
        if ($user->is_admin) {
            $orders = Order::paginate(10);
            return view('admin.orders.index', compact('orders'));
        }

        // Si es cliente, muestra solo sus órdenes
        $orders = $user->orders()->paginate(10);
        return view('user.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        // Cargar una vista para que el cliente cree una orden
        return view('user.orders.create');
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        // Validar que el usuario tenga acceso a esta orden
        $this->authorize('view', $order);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order)
    {
        // Validar que el usuario tenga acceso a editar esta orden
        $this->authorize('update', $order);

        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, Order $order)
    {
        $this->authorize('update', $order);

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $order->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
