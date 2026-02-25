<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**MAKE WALLET BE LINKED/STORED WITH THE CORRECT USER */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
        ]);
        $wallet = Wallet::create($request->all());
        return response()->json($wallet, 201);
    }

    /**MAKE WALLET SHOW THE BALANCE IT HAS */
    public function show($id)
    {
        $wallet = Wallet::with('transactions')->findOrFail($id);

        return response()->json([
            'wallet' => $wallet,
            'balance' => $wallet->balance
        ]);
    }
}
