<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Foto;
use App\Models\Album;
use App\Models\Evento;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AwsRekognition;
use Illuminate\Support\Facades\Auth;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;  ///paquete que sirve para reducir el tamaño de la foto

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
       /*  $foto  = new Foto();

        if ($request->hasFile('imagen')) {

            $file = $request->file('imagen');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destinationPath = storage_path() . '\app\public\imagenes/' . $filename;

            Image::make($request->file('imagen'))
                ->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    //$constraint->upsize();
                })
            ->save($destinationPath);
            $foto->imagen = 'storage/imagenes/' . $filename;
        };
        $foto->estado = $request->estado;
        $foto->fotografo_id = Auth::user()->id;
        $foto->evento_id = $request->evento_id;
        $foto->save(); */



          /*CONEXION CON AWS REKOGNITION  */
          if ($request->hasFile('imagen')) {

            try {
                $foto  = new Foto();
                $file = $request->file('imagen');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPath = storage_path() . '\app\public\imagenes/' . $filename;

                Image::make($request->file('imagen'))
                    ->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                        //$constraint->upsize();
                    })
                ->save($destinationPath);
                $foto->imagen = 'storage/imagenes/' . $filename;
                $foto->estado = $request->estado;
                $foto->fotografo_id = Auth::user()->id;
                $foto->evento_id = $request->evento_id;
                $foto->save();

                // REKOGNITION

                $client = new RekognitionClient([
                    'region' => 'us-east-1',
                    'version' => 'latest'
                ]);

                /* OBTENIENDO LA IMG */
                $image = fopen($request->file('imagen')->getPathName(), 'r');
                $bytes = fread($image, $request->file('imagen')->getSize());
                $collectionName = 'estudioFotografico';

                /* CONSULTANDO EL SERVICIO DE AWS */
                $result = $client->searchFacesByImage([

                    "CollectionId" => $collectionName,
                    "FaceMatchThreshold" => 0,
                    'Image' => ['Bytes' => $bytes],
                    'MaxFaces' => 1,
                    'QualityFilter' => 'AUTO',
                ]);

                $result = $result['FaceMatches'];
                $result = array_values($result);
                // dd($result);
                //  dd($fotoEvento->id);
                foreach ($result as $res) {
                    $data = $res['Face'];

                    $similitud = $res['Similarity'];

                    if ($similitud >= 51) {
                        $guardar = new AwsRekognition;
                        $guardar->faceId = $data['FaceId'];
                        $guardar->cliente_id = $data['ExternalImageId'];
                        $guardar->evento_id = $request->evento_id;

                        $guardar->path_foto = 'storage/imagenes/' . $filename;
                        $guardar->similitud = round($similitud, 3);
                        $guardar->fotos_id = $foto->id;//obtiene el id de la foto guardada en ese instante
                        $guardar->save();


                    } else {
                        return  redirect()->back();
                    }
                }

                return  redirect()->back();
            } catch (Exception $e) {
                dd($e);
            }
        }

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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



}
