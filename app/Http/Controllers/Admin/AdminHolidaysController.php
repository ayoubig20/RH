<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Holidays;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class AdminHolidaysController extends Controller
{
    //  public function fetch(){
    // $responses=Http::get('')
    //  }
    public function index()
    {
        //     $client = new Client();

        //     $currentYear = Carbon::now()->year;

        //     $response = $client->request('GET', 'https://calendarific.com/api/v2/holidays', [
        //         'query' => [
        //             'api_key' => '6e676cc7924d4052457e268fc95b02d8d2c2c8a7',
        //             'country' => 'MA',
        //             'year' => $currentYear,
        //         ],
        //     ]);

        //     $holidaysData = json_decode($response->getBody()->getContents(), true)['response']['holidays'];


        // foreach ($holidaysData as $holidayData) {
        //     // Create a new Holiday model and save it to the database
        //     $holiday = new Holidays();
        //     $holiday->name = $holidayData['name'];
        //     $holiday->description = $holidayData['description'];
        //     $holiday->country = $holidayData['country']['name'];

        //     // Convert the date string to a valid MySQL date format
        //     $dateString = $holidayData['date']['iso'];
        //     $holiday->date = Carbon::parse($dateString)->format('Y-m-d');

        //     $holiday->type = implode(', ', $holidayData['type']);
        //     $holiday->primary_type = $holidayData['primary_type'];
        //     $holiday->urlid = $holidayData['urlid'];
        //     $holiday->save();
        // }
        $holidays = Holidays::all();
        return view('admin.holidays.index', compact('holidays'));
    }

    public function create()
    {
        return view('admin.holidays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'day' => 'required'
        ]);

        $holiday = new Holidays;
        $holiday->name = $request->input('name');
        $holiday->date = $request->input('date');
        $holiday->day = $request->input('day');
        $holiday->save();

        return redirect()->route('admin.holidays.index')->with('success', 'Holiday created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = Holidays::find($id);
        return view('admin.holidays.edit', compact('holiday'));
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
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'day' => 'required'
        ]);

        $holiday = Holidays::find($id);
        $holiday->name = $request->input('name');
        $holiday->date = $request->input('date');
        $holiday->day = $request->input('day');
        $holiday->save();

        return redirect()->route('admin.holidays.index')->with('success', 'Holiday updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holiday = Holidays::find($id);
        $holiday->delete();

        return redirect()->route('admin.holidays.index')->with('success', 'Holiday deleted successfully');
    }
}
     //
