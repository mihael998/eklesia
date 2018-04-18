<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformer\ChiesaTransformer;
use SKAgarwal\GoogleApi\PlacesApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chiesa;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;
use Illuminate\Support\Facades\Storage;
use DB;

class ChiesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $place_id = $request->input('place_id');
        $distanza = $request->input('distanza');
        $denominazioni = $request->input('denominazioni');
        $congregazioni = $request->input('congregazioni');
        $query = null;

        $chiese = DB::table("chiese")->join("comuni", "chiese.id_comune", "=", "comuni.id")->join("province", "comuni.id_provincia", "=", "province.id")->leftJoin("congregazioni", "chiese.id_congregazione", "=", "congregazioni.id")->leftJoin("denominazioni", "chiese.id_denominazione", "=", "denominazioni.id")->select("chiese.nome", "chiese.indirizzo", "denominazioni.nome as denominazione", "congregazioni.nome as congregazione", "comuni.nome as comune", "province.nome as provincia", "province.sigla_automobilistica as sigla_provincia");

        
        //$rawQuery = DB::raw("SELECT denominazioni.nome,congregazioni.nome,chiese.nome, chiese.indirizzo, comuni.nome, province.sigla_automobilistica FROM chiese inner join (comuni INNER JOIN province on comuni.id_provincia=province.id) on chiese.id_comune=comuni.id LEFT JOIN congregazioni on congregazioni.id=chiese.id_congregazione LEFT JOIN denominazioni on denominazioni.id=chiese.id_denominazione limit 10;");
        if ($place_id != null) {
            $googlePlaces = new PlacesApi('AIzaSyAjNAMBlIRSGCIjL-kNPAadRKDQVONPJ8U');
            $lingua["language"] = "it";
            $place = $googlePlaces->placeDetails($place_id, $lingua);
            $rawQuery = DB::raw("SELECT *
            FROM(
                SELECT chiese.*,
                p.radius,
                p.distance_unit
                        * DEGREES(ACOS(COS(RADIANS(p.latpoint))
                        * COS(RADIANS(comuni.latitudine))
                        * COS(RADIANS(p.longpoint) - RADIANS(comuni.longitudine))
                        + SIN(RADIANS(p.latpoint))
                        * SIN(RADIANS(comuni.latitudine)))) AS distance_in_km
                    FROM chiese INNER JOIN comuni on comuni.id=chiese.id_comune
                    JOIN (
                        SELECT  :latitudine  AS latpoint,  :longitudine AS longpoint,
                                :radius AS radius,      111.045 AS distance_unit
                    ) AS p ON 1=1
                    WHERE comuni.latitudine
                    BETWEEN p.latpoint  - (p.radius / p.distance_unit)
                        AND p.latpoint  + (p.radius / p.distance_unit)
                    AND comuni.longitudine
                    BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
                        AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
            )as d
            WHERE distance_in_km<=radius;");
            $subQuery=DB::table('chiese')->join(DB::raw("(
                SELECT :latitudine  AS latpoint,  :longitudine AS longpoint,
                        :radius AS radius,      111.045 AS distance_unit
            ) AS p",["latitudine" => 45.464204, "longitudine" => 9.189982, "radius" => 50]),"1","=","1")->whereBetween("comuni.latitudine",["p.latpoint  - (p.radius / p.distance_unit)","p.latpoint  + (p.radius / p.distance_unit)"])->whereBetween("comuni.longitudine",["p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))","p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))"])->select("p.radius,p.distance_unit * DEGREES(ACOS(COS(RADIANS(p.latpoint)) * COS(RADIANS(comuni.latitudine)) * COS(RADIANS(p.longpoint) - RADIANS(comuni.longitudine)) + SIN(RADIANS(p.latpoint)) * SIN(RADIANS(comuni.latitudine)))) AS distance_in_km");
            $chiese->mergeBindings($subQuery->getQuery());
            $chiese->addSelect('distance_in_km as distance',"radius");
            $chiese->where("distance","<=","radius");
                //$query = DB::select($rawQuery, ["latitudine" => $place["result"]["geometry"]["location"]["lat"], "longitudine" => $place["result"]["geometry"]["location"]["lng"], "radius" => $distanza]);
        }
        if ($denominazioni != null) {

        }
        if ($congregazioni != null) {

        }





        $risposta = DB::table('chiese')
            ->join('comuni', 'chiese.id_comune', '=', 'comuni.id');
        return response()->json([
            "place_id" => $place_id,
            "distanza" => $distanza,
            "denominazioni" => $denominazioni,
            "congregazioni" => $congregazioni,
            "risposta" => $query
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
        $chiesa = Chiesa::find($id);

        $resource = new Fractal\Resource\Item($chiesa, new ChiesaTransformer);
        $risposta = $manager->createData($resource)->toArray();
        if ($chiesa->abilitato == 1) {
            return response()->json([
                "message" => "Ok",
                "chiesa" => $risposta
            ]);
        } else {
            return response()->json([
                "message" => "Profilo chiesa non attivo",
                "chiesa" => $risposta
            ], 404);
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
