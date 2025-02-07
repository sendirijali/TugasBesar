<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminKurirController extends Controller
{
    public function index(){
        $couriers = User::where('usertype', 'user')->get();
        return view('admin.kurir.index', compact('couriers'));
    }
    public function create(){
        return view('admin.kurir.create');
    }
    public function store(Request $request){
        $courier = new User;
        $courier->name = $request->name;
        $courier->email = $request->email;
        $courier->password = Hash::make($request->password);
        $courier->save();
        return redirect()->route('admin.kurir');
    }
    public function edit(User $courier){
        return view('admin.kurir.edit', compact('courier'));
    }
    public function update(Request $request, User $courier){
        $courier->name = $request->name;
        $courier->email = $request->email;
        $courier->update();
        return redirect()->route('admin.kurir');
    }
    public function destroy(User $courier){
        $courier->delete();
        return redirect()->route('admin.kurir');
    }
}
