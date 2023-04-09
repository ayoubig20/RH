<?php

namespace App\Http\Controllers\Admin;

use App\Models\Holidays;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHolidaysController extends Controller
{ 
        public function index()
        {
            $holidays = Holidays::all();
            return view('admin.holidays.index', compact('holidays'));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
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


