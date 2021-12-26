<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calender;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Calender::all();
        return view('admin.calender.index')->with("events", $events);
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
        $request->validate([
            'event_name' => 'required',
            'event_type' => 'required',
            'event_date' => 'required',
            'event_start_time' => 'required',
            'event_end_time' => 'required',
            'description' => 'required',
        ]);
        try {

            $calender = new Calender();
            $calender->event_name = $request->event_name;
            $calender->event_type = $request->event_type;
            $calender->event_date = $request->event_date;
            $calender->event_start_time = $request->event_start_time;
            $calender->event_end_time = $request->event_end_time;
            $calender->description = $request->description;
            if($calender->save()){
                return redirect()->route('admin.calender')->withSuccess("Event Added Successfully")->withInput();
            }else{
                return redirect()->route('admin.calender')->withError("Something went wrong")->withInput();
            }

        } catch (Exception $ex) {
            return redirect()->route('admin.calender')->withError($ex->getMessage())->withInput();
        }
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
        //
    }
}
