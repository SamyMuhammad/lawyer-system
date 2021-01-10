<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:view clients')->only('index');
        $this->middleware('can:show client')->only('show');
        $this->middleware('can:create clients')->only(['create', 'store']);
        $this->middleware('can:edit clients')->only(['edit', 'update']);
        $this->middleware('can:delete clients')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('clients.index')->with('clients', $clients);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        
        if (!$client) {
            error(__('flashes.notFound'));
            return redirect()->route('client.index');
        }
        return view('clients.show')->with('client', $client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $data = $request->validated();

        $client = Client::create($data);

        success(__('flashes.store'));
        return redirect()->route('client.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        
        if (!$client) {
            error(__('flashes.notFound'));
            return redirect()->route('client.index');
        }

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $client = Client::find($id);
        
        if (!$client) {
            error(__('flashes.notFound'));
            return redirect()->route('client.index');
        }
        $data = $request->validated();
        
        $client->update($data);

        success(__('flashes.update'));
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        
        if (!$client) {
            error(__('flashes.notFound'));
            return redirect()->route('client.index');
        }

        $client->delete();

        success(__('flashes.destroy'));
        return redirect()->route('client.index');
    }
}
