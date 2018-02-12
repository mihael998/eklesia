<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Incontro;

class IncontriController extends Controller
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
        $incontri=auth()->user()->chiesa->incontri;
        return view("pages.incontri",[
            "incontri"=>$incontri
        ]);
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
        $incontro = new Incontro($request->all());

        auth()->user()->chiesa->incontri()->save($incontro);

        return redirect()->to("chiesa/incontri");
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'titolo' => 'required|string|max:255',
            'inizio' => 'required|date_format:H:i',
            'fine' => 'required|date_format:H:i|after:inizio',
            'giorno' => 'required|integer|between:1,7'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Incontro::destroy($id);
        return redirect()->to("chiesa/incontri");
    }
}
