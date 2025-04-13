<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;

class PruebaFirestoreController extends Controller
{
    public function test(FirebaseService $firebase)
    {
        $auth = $firebase->getAuth();
        $user = $auth->getUserByEmail('user@gmail.com');

        return response()->json($user);
    }

    public function test1(FirebaseService $firebase)
{
    $database = $firebase->getDatabase();

    $nuevoUsuario = [
        'nombre' => 'Juan Pérez',
        'email' => 'juan@example.com',
        'activo' => false,
    ];

    // Guardar bajo una clave automática en /usuarios
    $ref = $database->getReference('usuarios')->push($nuevoUsuario);

    return response()->json([
        'mensaje' => 'Usuario guardado correctamente',
        'id_generado' => $ref->getKey(),
    ]);
}

public function guardarEnFirestore(FirebaseService $firebase)
{
    $firestore = $firebase->getFirestore();

    $collection = $firestore->database()->collection('usuarios');

    $nuevoUsuario = [
        'nombre' => 'Laura Gómez',
        'email' => 'laura@example.com',
        'activo' => true,
    ];

    // Guardar con ID automático
    $document = $collection->add($nuevoUsuario);

    return response()->json([
        'mensaje' => 'Documento creado en Firestore',
        'document_id' => $document->id(),
    ]);
}
}
