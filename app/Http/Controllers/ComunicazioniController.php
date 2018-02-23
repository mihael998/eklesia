<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comunicazione;
use Illuminate\Support\Facades\Validator;
class ComunicazioniController extends Controller
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
        $comunicazioni=auth()->user()->chiesa->comunicazioni;
        return view("pages.comunicazioni",[
            "comunicazioni"=>$comunicazioni
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
        if(!$request->filled("descrizione")){
            $request->merge(["descrizione" => $request->input("titolo")]);
        }
        $comunicazione = new Comunicazione($request->all());
        auth()->user()->chiesa->comunicazioni()->save($comunicazione);

        return redirect()->to("chiesa/comunicazioni");
    }

    /**@
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
        $this->validator($request->all())->validate();
        $comunicazione=Comunicazione::find($id);
        if(!$request->filled("descrizione")){
            $request->merge(["descrizione" => $request->input("titolo")]);
        }
        $comunicazione->update($request->all());

        return redirect()->to("chiesa/comunicazioni");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comunicazione::destroy($id);
        return redirect()->to("chiesa/comunicazioni");
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'titolo' => 'required|string|max:255',
            'data' => 'required_with:orario|date',
            'orario' => 'required_with:data|date_format:H:i',
            'descrizione' => 'nullable|string|max:1000',
            'prioritario' => 'required|boolean',
            'privato' => 'required|boolean',
        ]);
    }

}
