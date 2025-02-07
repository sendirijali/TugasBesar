<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourierController extends Controller
{
    public function index (){
        $couriers= Tracking::where('courier_id', Auth::user()->id)->get();
        return view('kurir.index', compact('couriers'));
    }
    public function edit (Tracking $courier){
        // dd($courier);
        return view('kurir.edit', compact('courier'));
    }
    public function update (Request $request, Tracking $courier){
        if(!$courier->lokasi1){
            $courier->lokasi1=$request->lokasi;
        } elseif(!$courier->lokasi2){
            $courier->lokasi2=$request->lokasi;
        }elseif(!$courier->lokasi3){
            $courier->lokasi3=$request->lokasi;
        }
        $courier->update();
        return redirect()->route('dashboard');
    }
}
