<?php

namespace App\Http\Controllers;

use App\Models\FotoPerfil;
use App\Models\Cliente;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FotoPerfilClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotoPerfilCliente = FotoPerfil::where('cliente_id',Auth::user()->id)
                                        ->orderBy('id','desc')->get();
        return view('fotoPerfiles.index', compact('fotoPerfilCliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image'
        ]);
        $foto  = new FotoPerfil();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destinationPath = storage_path() . '\app\public\imagenes/' . $filename;

            Image::make($request->file('imagen'))
                ->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save($destinationPath);
            $foto->imagen = 'storage/imagenes/' . $filename;
        };
        $foto->cliente_id = Auth::user()->id;
        $foto->save();

        return redirect()->route('fotoPerfiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        return view('fotoPerfiles.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function subirImagen(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image'
        ]);

        $foto  = new FotoPerfil();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destinationPath = storage_path() . '\app\public\fotosClientes/' . $filename;

            Image::make($request->file('imagen'))
                ->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save($destinationPath);
            $foto->imagen = 'storage/fotosClientes/' . $filename;
        };
        $foto->cliente_id = Auth::user()->id;
        $foto->save();

        return redirect()->route('fotoPerfiles.subirFotoCliente');
    }
    public function vistaSubirFotoCliente(){

        //return view('fotoPerfiles.subirFotoCliente');
    }

    //TODO Método para visualizar las fotos en donde aparece el cliente

    public function fotosClienteReconocidas(){
        return view('fotoPerfiles.show');
    }
}
