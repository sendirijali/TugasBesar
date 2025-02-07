<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index(){
        $trackings = Tracking::get();
        return view('admin.tracking.index', compact('trackings'));
    }
    public function create()  {
        $couriers = User::where('usertype', 'user')->get();
        // dd($couriers);
        return view('admin.tracking.create',compact('couriers'));
    }
    public function store(Request $request){
        // $request->validate([
        //     'nama' => 'required|string',
        //     'resi' => 'required|string',
        //     'alamat' => 'required|string',
        //     'handphone' => 'required|string',
        //     'deskripsi' => 'required|string',
        // ]);

        Tracking::factory(1)->create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'handphone' => $request->handphone,
            'deskripsi' => $request->deskripsi,
            'courier_id' => $request->courier,
        ]);

        // $tracking = new Tracking;
        // $tracking->nama = $request->nama;
        // $tracking->alamat = $request->alamat;
        // $tracking->handphone = $request->handphone;
        // $tracking->deskripsi = $request->deskripsi;
        // $tracking->kurir_id = $request->courier;
        // $tracking->resi = $tracking->factory(1);
        // $tracking->save();
        return redirect()->route('admin.tracking');
    }

    public function edit(Tracking $tracking){
        $couriers = User::where('usertype', 'user')->get();
        return view('admin.tracking.edit', compact(['tracking','couriers']));
    }

    public function update(Request $request, Tracking $tracking){
        $tracking->nama = $request->nama;
        $tracking->alamat = $request->alamat;
        $tracking->handphone = $request->handphone;
        $tracking->deskripsi = $request->deskripsi;
        if($request->courier){
            $tracking->courier_id = $request->courier;
        }
        $tracking->update();
        return redirect()->route('admin.tracking');
    }

    public function destroy(Tracking $tracking){
        $tracking->delete();
        return redirect()->route('admin.tracking');
    }
}


