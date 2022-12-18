<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(){
        $wallet = Wallet::all();
        return view('wallet.index', ['wallet'=>$wallet]);
    }

    public function create(){
        return view('wallet.create');
    }

    public function edit(Wallet $wallet){
        return view('wallet.edit', ['wallet' => $wallet]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'cash' => 'required|numeric',
            'wallet_id' => 'numeric'
        ]);
        Auth::user()->wallets()->create($validated);
        return redirect()->route('wallet.index');
    }

    public function update(Request $request, Wallet $wallet){
        $wallet->update([
            'cash' => $request->input('cash'),
        ]);
        return redirect()->route('wallet.index');
    }

    public function destroy(Wallet $wallet){
        $wallet->delete();
        return redirect()->route('wallet.index');
    }
}
