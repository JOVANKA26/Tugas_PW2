<?php

namespace App\Http\Controllers;

use App\Models\Judul;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JudulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = Judul::with('genre')-> get();
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
                'nama'      => 'required|unique:fakultas',
                'kode'      => 'required'
                'genre_id' => 'required|exists:genre,id',
            ]
        );

        $judul = Judul::create($validate);
        if ($judul) {
        return response()->json([
            'success' => true,
            'message' => "Judul berhasil disimpan",
            'data'    => $judul
        ], 201);
        } else {
        return response()->json([
            'success' => false,
            'message' => "Judul gagal disimpan"
        ], 500);
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
       //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Judul $judul)
    {
         $judul = Judul::where('id', $id);
        if($judul) {
            $judul->delete();
            $data['success'] = true;
            $data['message'] = "Judul berhasil dihapus";
            return response()->json($data, Response::HTTP_OK);
        }else {
            $data['success'] = true;
            $data['message'] = "Judul tidak ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
