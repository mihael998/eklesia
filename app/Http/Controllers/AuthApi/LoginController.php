<?php

namespace App\Http\Controllers\AuthApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Utente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Psr7\Response;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $utente = Auth::guard("api")->user()->with(['chieseSeguite:id', 'eventiSeguiti:id'])->get();
        $utente=Auth::guard("api")->user();
        $risposta=$utente->with(['chieseSeguite:id', 'eventiSeguiti:id'])->where('utenti.id',$utente->id)->first();
        return response()->json([
            "message" => "Authenticated",
            "utente" => $risposta
        ]);
    }

    public function mailVerification($mail)
    {
        $user = Utente::where('email', $mail)->first();
        if ($user) {
            return response()->json([
                'message' => "L'email è già in uso"
            ],404);
        }
        else{
            return response()->json([
                'message' => "ok"
            ]);
        }
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
    public function login(Request $request)
    {
        $this->validator($request->all())->validate();
        $utente = new Utente($request->all());
        $utente->pwd = bcrypt($request->input("password"));
        $utente->save();

        return response()->json([
            "message" => "ok"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user('api')->token()->revoke();


        Session::flush();

        Session::regenerate();

        return response()->json([
            'message' => 'User was logged out'
        ]);
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'data_nascita' => 'required|date',
            'sesso' => 'required|boolean',
            'email' => 'required|email|max:255|unique:utenti',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
