<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformer\ChiesaTransformer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chiesa;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;
use Illuminate\Support\Facades\Storage;

class ChiesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manager = new Manager();
        $manager->setSerializer(new ArraySerializer());
        $chiesa=Chiesa::find($id);
    
        $resource = new Fractal\Resource\Item($chiesa, new ChiesaTransformer);
        $risposta=$manager->createData($resource)->toArray();

        if($chiesa->abilitato==1){
            return response()->json([
                "message" => "Ok",
                "chiesa" => $risposta
            ]);
        }
        else{
            return response()->json([
                "message" => "Profilo chiesa non attivo",
                "chiesa" => $risposta
            ],404);
        }
        


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
