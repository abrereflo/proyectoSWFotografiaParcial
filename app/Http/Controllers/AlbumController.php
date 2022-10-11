<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Fotografo; //// AQUI AUMENTE ESTO
use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;  ///paquete que sirve para reducir el tamaño de la foto
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Album::where('fotografo_id',auth()->user()->id)->paginate(10);
        return view('albums.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $eventos = Evento::where('fotografo_id',auth()->user()->id)->get();
       $eventos = Evento::all();
        return view('albums.create', compact('eventos'));
    }

  /*  public function fotos($album_id){
        $album = Album::find($album_id);
        $fotografo = Auth::user()->id;
        $fotos = Foto::where([
            'fotografo_id' => $fotografo,   
            'album_id' => $album->id
        ])->get();

        return view('albums.index',compact('fotos','album')); 
    }*/

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
      //  $album = Album::find($album_id);
        $request->validate([
            'cantidad_fotos' => 'required',
            'file' => 'required|image'
        ]);
        $album  = new Album();
        $album->cantidad_fotos = $request->cantidad_fotos;
        if($request->hasFile('file')){
            $file= $request->file('file');
            $filename = time() .'-'. $file->getClientOriginalName();
            $destinationPath = storage_path() . '\app\public\imagenes/' . $filename;
            //$uploadsucess = $request->file('file')->move($destinationPath, $filename); //lo descomente 

           // $album = Str::random(10) . $request->file('file')->getClientOriginalName();  //lo descomente 
          //  $ruta = storage_path() . 'app\public\files' . $album; //lo descomente 
            Image::make($request->file('file'))
                ->resize(1200, null, function ($constraint){
                $constraint->aspectRatio();
               // $constraint->upsize();
            }) //->insert(public_path('watermark.png', 'center', 10, 10))->save($destinationPath);

            ->save($destinationPath);
            //$album->file = $destinationPath.$filename;
            $album->file = 'storage/imagenes/' . $filename;

        }; 
        $album->estado = $request->estado;
        $album->fotografo_id = Auth::user()->id;
        $album->evento_id = 1;
        $album->save();

        //$album->url = $request->url;


        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        return view('albums.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $albums = Album::findOrFail($id);
        return view('albums.edit',compact('albums'));

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
        $album = Album::findOrFail($id);
        $datos = $request->all();
        $album->update($datos);

        return redirect()->route('albums.index')->with('mensaje','Datos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::find($id)->delete();
        return redirect()->route('albums.index');
    }
}
