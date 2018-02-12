<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Predica;
use App\TagPredica;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PredicheController extends Controller
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
        $prediche = auth()->user()->chiesa->prediche;
        return view("pages.prediche", [
            "prediche" => $prediche
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
        $predica = new Predica($request->all());
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio');
            $name = time() . $predica->titolo . $predica->autore . '.' . $audio->getClientOriginalExtension();
            $destinationPath = public_path('/audio/prediche');
            $audio->move($destinationPath, $name);
            $predica->audio = $name;
        }
        auth()->user()->chiesa->prediche()->save($predica);

        if ($request->has("tags")) {
            $tags = explode("#", $request->input("tags"));
            for ($i = 1; $i < count($tags); $i++) {
                $tagPredica = new TagPredica();
                $tagPredica->nome = trim($tags[$i]);
                $predica->tags()->save($tagPredica);
            }
        }


        return redirect()->to("chiesa/prediche");
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
        $predica=Predica::find($id);
        if ($predica->audio!=('')) {
            if (File::exists("audio/prediche/" . $predica->audio))
                File::delete("audio/prediche/" . $predica->audio);
        }
        $predica->delete();
        return redirect()->to("chiesa/prediche");
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'titolo' => 'required|string|max:255',
            'data' => 'required|date',
            'contenuto' => 'nullable|string',
            'autore' => 'required|string|max:255',
            'privato' => 'required|boolean',
            'audio' => 'required_without:contenuto|file|max:2048',
            'tags' => 'nullable|string'
        ]);
    }
}
