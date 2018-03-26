<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regione;
use App\Congregazione;
use App\Chiesa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Core\ServiceBuilder;
use League\Flysystem\Filesystem;
use Superbalist\Flysystem\GoogleStorage\GoogleStorageAdapter;

class ChiesaController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->cannot("see-dashboard")) {
            return view('pages.registra-chiesa', [
                'regioni' => Regione::all(),
                'congregazioni' => Congregazione::all()
            ]);
        } else {
            return redirect()->to("chiesa/home");
        }
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
        $chiesa = new Chiesa($request->all());
        $chiesa->abilitato = 1;
        $chiesa->id_comune = $request->input("comune");
        $chiesa->id_congregazione = $request->input("congregazione");
        $chiesa->id_denominazione = $request->input("denominazione");


        $disk = Storage::disk('gcs');

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = time() . '.' . $image->getClientOriginalExtension();
            //$destinationPath = public_path('/img/chiese');
            $disk->putFileAs('public/img/chiese', $image, $name);
            //$image->move($destinationPath, $name);
            $chiesa->foto = $name;
        }

        auth()->user()->chiesa()->save($chiesa);

        return redirect()->to("chiesa/home");
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|string|max:255',
            'indirizzo' => 'required|string',
            'comune' => 'required|integer|exists:comuni,id',
            'congregazione' => 'nullable|integer|exists:congregazioni,id',
            'denominazione' => 'nullable|integer|exists:denominazioni,id',
            'email' => 'nullable|string|email|max:255',
            'sito' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (auth()->user()->can("see-dashboard")) {
            return view("pages.home", [
                'chiesa' => auth()->user()->chiesa,
                'regioni' => Regione::all(),
                'congregazioni' => Congregazione::all()
            ]);
        } else {
            return redirect()->to("/chiese/registra");
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validator($request->all())->validate();
        $chiesa = auth()->user()->chiesa;
        $chiesa->update($request->all());
        $chiesa = auth()->user()->chiesa;
        $chiesa->id_comune = $request->input("comune");
        $chiesa->id_denominazione = $request->input("denominazione");

        $chiesa->id_congregazione = $request->input("congregazione");
        $disk = Storage::disk('gcs');
        if ($request->hasFile('foto')) {
            if ($disk->exists('public/img/chiese/' . $chiesa->foto))
                $disk->delete('public/img/chiese/' . $chiesa->foto);
            $image = $request->file('foto');
            $name = time() . $chiesa->id . '.Mihael.' . $image->getClientOriginalExtension();
            $disk->putFileAs('public/img/chiese', $image, $name);
            $chiesa->foto = $name;

        }

        $chiesa->save();

        return redirect()->to("chiesa/home");
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
