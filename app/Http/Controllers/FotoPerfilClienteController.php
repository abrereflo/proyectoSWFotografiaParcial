<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\FotoPerfil;
use Illuminate\Http\Request;
use App\Models\AwsRekognition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Aws\Rekognition\RekognitionClient;

class FotoPerfilClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotoPerfilCliente = FotoPerfil::where('cliente_id', Auth::user()->id)
            ->orderBy('id', 'desc')->get();
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


       /* if ($request->hasFile('imagen')) {
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
        $foto->save(); */




        /*CONEXION CON AWS REKOGNITION  */

        if ($request->hasFile('imagen')) {

            $client = new RekognitionClient([
                'region' => 'us-east-1',
                'version' => 'latest'
            ]);

            /* COon LA IMG */
            $image = fopen($request->file('imagen')->getPathName(), 'r');
            $bytes = fread($image, $request->file('imagen')->getSize());
            $collectionName = 'estudioFotografico';

            /* CONSULTANDO EL SERVICIO DE AWS */

            $result = $client->indexFaces([
                "CollectionId" => $collectionName,
                'DetectionAttributes' => ['DEFAULT'],
                'ExternalImageId' => '' . Auth::user()->id . '',
                'Image' => ['Bytes' => $bytes],
                'MaxFaces' => 1,
                'QualityFilter' => 'AUTO',
            ]);

            $result->get('indexFaces');
            // dd($result);

            try {
                $foto  = new FotoPerfil();
                //galeriaP=> galeria Personal del fotografo
                $file = $request->file('imagen');
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPath = storage_path() . '\app\public\imagenes/' . $filename;

                Image::make($request->file('imagen'))
                    ->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($destinationPath);

                $foto->imagen = 'storage/imagenes/' . $filename;
                $foto->cliente_id = Auth::user()->id;
                $foto->save();
                return redirect()->back();
            } catch (\Exception $e) {
                dd($e);
            }
        }

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
    public function vistaSubirFotoCliente()
    {

        //return view('fotoPerfiles.subirFotoCliente');
    }

    //TODO Método para visualizar las fotos en donde aparece el cliente

    public function fotosClienteReconocidas()
    {
        $fotoReconocida=DB::table('aws_rekognitions')
                            ->select(["aws_rekognitions.path_foto","eventos.nombre","eventos.fecha",])
                            ->join('fotos',"fotos.id","=","aws_rekognitions.fotos_id")
                            ->join('eventos',"eventos.id","=","fotos.evento_id")
                            ->where('aws_rekognitions.cliente_id',Auth::user()->id)
                            ->get();

        return view('fotoPerfiles.show',compact('fotoReconocida'));
    }
}
