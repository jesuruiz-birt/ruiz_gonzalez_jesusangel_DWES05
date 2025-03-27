<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class ArtistaController extends Controller
{
    public function index()
    {
        try {
            $artistas = Artista::all();

            if ($artistas->isEmpty()) {
                return response()->json(['message' => 'No se encontraron artistas'], 404);
            }

            return response()->json(['artistas' => $artistas], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error al obtener los artistas: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $artista = Artista::findOrFail($id);
            return response()->json(['artista' => $artista], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Artista no encontrado'], 404);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error al obtener el artista: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required',
                'nacionalidad' => 'nullable|string',
            ]);

            $artista = Artista::create($request->all());

            return response()->json(['message' => 'Artista creado correctamente', 'artista' => $artista], 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Error de validación', 'errors' => $e->errors()], 422);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error al crear el artista: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $artista = Artista::findOrFail($id);

            $request->validate([
                'nombre' => 'required',
                'nacionalidad' => 'nullable|string',
            ]);

            $artista->update($request->all());

            return response()->json(['message' => 'Artista actualizado correctamente', 'artista' => $artista], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Artista no encontrado'], 404);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Error de validación', 'errors' => $e->errors()], 422);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error al actualizar el artista: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $artista = Artista::findOrFail($id);
            $artista->delete();
            return response()->json(['message' => 'Artista ' . $id . ' eliminado correctamente'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Artista no encontrado'], 404);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error al eliminar el artista: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }
}