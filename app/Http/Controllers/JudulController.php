<?php

namespace App\Http\Controllers;

use App\Models\Judul;
use Illuminate\Http\Request;

class JudulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $judul = Judul::all();
        return response() -> json($judul ,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'nama' => 'required|unique:fakultas',
                'kode' => 'required'

            ]
        );

        $judul = Judul::create($validate);
        if($judul){
            $data['success'] = true;
            $data['message'] = "Judul berhasil disimpan";
            $data['data'] = $judul;
            return response()->json($data, 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Judul $judul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Judul $judul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Judul $judul)
    {
        $judul = Judul::find($id);
        if($judul){
            $validate = $request->validate(
                [
                    'nama' => 'required',
                    'kode' => 'required'

                ]
        );
                //update data fakultas
        Judul::where('id' , $id)->update($validate);
            //Mengambil data fakulatas yang sudah diperbarui
            $judul = Judul::find($id);
            if ($judul){
            $data['success'] = true;
            $data['message'] = "Judul berhasil disimpan";
            $data['data'] = $judul;
            return response()->json($data, 201);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Judul $judul)
    {
        //
    }
}
