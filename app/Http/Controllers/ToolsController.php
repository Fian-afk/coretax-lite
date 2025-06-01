<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response 
    {
        dd('index'); //Fungsinya untuk menampilkan daftar data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        dd('create'); //Fungsinya untuk menampilkan form tambah data baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        dd('store'); //Fungsinya untuk menyimpan data baru
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        dd('show'); //Fungsinya untuk menampilkan detail data berdasarkan id
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        dd('edit'); //Fungsinya untuk menampilkan form edit data
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        dd('update'); //Fungsinya untuk mengupdate data
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedoirectResponse
    {
        dd('store'); //Fungsinya untuk menghapus data
    }
}
