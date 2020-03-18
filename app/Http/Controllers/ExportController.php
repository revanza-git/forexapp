<?php

namespace App\Http\Controllers;

use App\Ohlc;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Request;


class ExportController extends Controller
{
    // public function export()
    // {
    //     $article = new Article;
    //     $export = $article->export();

    //     return response($export, 200)->header('Content-Type', 'application/json');
    // }

    public function getLatestOhlcs(Request $request)
    {
        //that's how you access an object
        //\Log::debug($request::all());
        $id = $request::all()['id'];
        //\Log::debug($id);
        $client = new Client();
        $ohlc = new Ohlc();

        //truncate last data
        $ohlc::truncate();
        $response = $client->request('GET', 'https://fcsapi.com/api-v2/forex/history?id=' . $id . '&period=1h&access_key=qrmAi7AFwIOn5CqO9Ct3cv3pOMGrWIIpBE0KjqbO0Qh9DjwQwV');

        $data = json_decode($response->getBody()->getContents(), true)['response'];
        // $data2 = $response->getBody()->getContents();
        // $flight->fill(['name' => 'Flight 22']);

        foreach ($data as $row) {
            // \Log::debug($row);
            $ohlc::create([
                'symbol_id' => $id,
                'open' => $row['o'],
                'high' => $row['h'],
                'low' => $row['l'],
                'close' => $row['c'],
                'uts' => $row['t'],
                'utc' => $row['tm']
            ]);
        }


        return response()->json(200)->header('Content-Type', 'application/json');
    }
}
