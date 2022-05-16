<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
//al usar esta clase me genera un error junto con la de la linea 10:
//use Illuminate\Auth\Access\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class AuthorController extends Controller{




    //se esta obligando a la funcion a que retorne el tipo JsonResponse
    public function showAllAuthors():JsonResponse{
        return response()->json(Author::all());
    }

    public function showOneAuthor($id):JsonResponse
    {
        return response()->json(Author::find($id));
    }

   //metodo que valida que las entradas sean de manera correcta
   public function create(Request $request):JsonResponse
   {

      $this->validate(
          $request,[
              'name'=>'required',
              'email'=>'required|email|unique:authors',
              'location'=>'required|alpha'
          ]);
          $author= Author::create($request->all());
          return response()->json($author, Response::HTTP_CREATED);
   }

    public function update($id, Request $request):JsonResponse
    {
        $author= Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, Response::HTTP_OK);
    }

    public function delete($id){
        Author::finOrFail($id)->delete();
        return response('Deleted Successfully', Response::HTTP_OK);
    }
}
