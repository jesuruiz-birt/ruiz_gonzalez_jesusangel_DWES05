<?php 

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

use App\Http\Resources\CancionResource;

class DiscoController extends Controller
{
    public function index()
    {
        try {
            // $canciones = Cancion::all();
            $canciones = Cancion::with('artista')->get();

            if ($canciones->isEmpty()) {
                return response()->json(['message' => 'No se encontraron canciones'], 404);
            }

            //return response()->json(['canciones' => $canciones], 200);
            return CancionResource::collection($canciones);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error al obtener las canciones: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $cancion = Cancion::findOrFail($id);
            return response()->json(['cancion' => $cancion], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Canción no encontrada'], 404);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error al obtener la canción: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required',
                'genero' => 'required',
                'anio_lanzamiento' => 'required|integer',
                'id_artista' => 'required|exists:artistas,id_artista',
            ]);

            $cancion = Cancion::create($request->all());

            return response()->json(['message' => 'Canción creada correctamente', 'cancion' => $cancion], 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Error de validación', 'errors' => $e->errors()], 422);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error al crear la canción: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $cancion = Cancion::findOrFail($id);

            $request->validate([
                'nombre' => 'required',
                'genero' => 'required',
                'anio_lanzamiento' => 'required|integer',
                'id_artista' => 'required|exists:artistas,id_artista',
            ]);

            $cancion->update($request->all());

            return response()->json(['message' => 'Canción ' . $id . ' actualizada correctamente', 'cancion' => $cancion], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Canción no encontrada'], 404);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Error de validación', 'errors' => $e->errors()], 422);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error al actualizar la canción: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
            //return $cancion;
    }

    public function destroy($id)
    {
        try {
            $cancion = Cancion::findOrFail($id);
            $cancion->delete();
            return response()->json(['message' => 'Canción ' . $id . ' eliminada correctamente'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Canción no encontrada'], 404);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error al eliminar la canción: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }
}