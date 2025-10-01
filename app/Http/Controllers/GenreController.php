<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $genre = Genre::all();
        return response() -> json($genre ,200);
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
                'nama' => 'required|unique:genres',
                'kode' => 'required|'

            ]
        );

        $genre = Genre::create($validate);
        if($genre){
            $data['success'] = true;
            $data['message'] = "Genre berhasil disimpan";
            $data['data'] = $genre;
            return response()->json($data, 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        $validate = $request->validate(
            [
                'nama' => 'required|unique:genre',
                'kode' => 'required|'

            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $id)
    {
         $genre = Genre::find($id);
        if($genre){
            $validate = $request->validate(
                [
                    'nama' => 'required',
                    'kode' => 'required'

                ]
        );     
        Genre::where('id' , $id)->update($validate);
            $genre = Genre::find($id);
            if ($genre){
            $data['success'] = true;
            $data['message'] = "Genre berhasil diupdate";
            $data['data'] = $genre;
            return response()->json($data, 201);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $id)
    {
        $genre = Genre::where('id', $id);
        if($genre) {
            $genre->delete();
            $data['success'] = true;
            $data['message'] = "Genre berhasil dihapus";
            return response()->json($data, Response::HTTP_OK);
        }else {
            $data['success'] = true;
            $data['message'] = "Genre tidak ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
