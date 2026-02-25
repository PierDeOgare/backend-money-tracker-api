<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**CREATE AND STORE USER */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);
        return User::create($request->all());
    }

    /**SHOW USER PROFILE */
    public function show($id)
    {
        $user = User::with('wallets.transactions')->findOrFail($id);
        $totalBalance = $user->wallets->sum->balance;

        return response()->json([
            'user' => $user,
            'total_balance' => $totalBalance
        ]);
    }
}
