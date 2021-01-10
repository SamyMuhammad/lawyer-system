<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SessionRoll;
use Illuminate\Http\Request;
use App\Http\Requests\SessionRollRequest;

class SessionRollController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:view session-rolls')->only('index');
        $this->middleware('can:show session-roll')->only('show');
        $this->middleware('can:create session-rolls')->only(['create', 'store']);
        $this->middleware('can:edit session-rolls')->only(['edit', 'update']);
        $this->middleware('can:delete session-rolls')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolls = SessionRoll::with('client')->paginate(10);
        return view('session-rolls.index')->with('rolls', $rolls);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roll = SessionRoll::find($id);
        
        if (!$roll) {
            error(__('flashes.notFound'));
            return redirect()->route('session-roll.index');
        }
        return view('session-rolls.show')->with('roll', $roll);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get(['id', 'code', 'name']);
        return view('session-rolls.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionRollRequest $request)
    {
        $data = $request->validated();

        $roll = SessionRoll::create($data);

        success(__('flashes.store'));
        return redirect()->route('session-roll.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roll = SessionRoll::find($id);
        
        if (!$roll) {
            error(__('flashes.notFound'));
            return redirect()->route('session-roll.index');
        }
        $clients = Client::get(['id', 'code', 'name']);
        return view('session-rolls.edit', compact('roll', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SessionRollRequest $request, $id)
    {
        $roll = SessionRoll::find($id);
        
        if (!$roll) {
            error(__('flashes.notFound'));
            return redirect()->route('session-roll.index');
        }
        $data = $request->validated();
        
        $roll->update($data);

        success(__('flashes.update'));
        return redirect()->route('session-roll.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roll = SessionRoll::find($id);
        
        if (!$roll) {
            error(__('flashes.notFound'));
            return redirect()->route('session-roll.index');
        }

        $roll->delete();

        success(__('flashes.destroy'));
        return redirect()->route('session-roll.index');
    }
    
    /**
     * Get the items in a certain date range.
     * 
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dateRange(Request $request)
    {
        $data = $request->validate([
            'from' => 'required|date_format:Y-m-d|lte:to',
            'to' => 'required|date_format:Y-m-d|gte:from'
        ]);

        $rolls = SessionRoll::whereBetween('date', [$data['from'], $data['to']])->get();

        return view('session-rolls.dateRange')->with('rolls', $rolls);
    }
}