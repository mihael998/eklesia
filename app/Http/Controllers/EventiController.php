<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regione;
use App\Evento;
use Illuminate\Support\Facades\Validator;

class EventiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventi=auth()->user()->chiesa->eventi;
        return view("pages.eventi",[
            "eventi"=>$eventi,
            'regioni' => Regione::all()
        ]);
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
        $this->validator($request->all())->validate();
        $evento = new Evento($request->all());
        if($request->has("comune"))
        $evento->id_comune = $request->input("comune");
        auth()->user()->chiesa->eventi()->save($evento);

        return redirect()->to("chiesa/eventi");
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
        Evento::destroy($id);
        return redirect()->to("chiesa/eventi");
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'titolo' => 'required|string|max:255',
            'data_inizio' => 'required|date',
            'data_fine' => 'required|date|after:data_inizio',
            'descrizione' => 'required|string|max:1000',
            'privato' => 'required|boolean',
            'indirizzo' => 'required_with:comune',
            'comune' => 'required_with:indirizzo|integer|exists:comuni,id'
        ]);
    }
}
