<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ExpertIssue;
use Illuminate\Http\Request;
use App\Http\Requests\ExpertIssueRequest;

class ExpertIssueController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:view expert-issues')->only('index');
        $this->middleware('can:show expert-issue')->only('show');
        $this->middleware('can:create expert-issues')->only(['create', 'store']);
        $this->middleware('can:edit expert-issues')->only(['edit', 'update']);
        $this->middleware('can:delete expert-issues')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = ExpertIssue::with('client')->paginate(10);
        return view('expert-issues.index')->with('issues', $issues);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issue = ExpertIssue::find($id);
        
        if (!$issue) {
            error(__('flashes.notFound'));
            return redirect()->route('expert-issue.index');
        }
        return view('expert-issues.show')->with('issue', $issue);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get(['id', 'code', 'name']);
        return view('expert-issues.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpertIssueRequest $request)
    {
        $data = $request->validated();

        $issue = ExpertIssue::create($data);

        success(__('flashes.store'));
        return redirect()->route('expert-issue.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issue = ExpertIssue::find($id);
        
        if (!$issue) {
            error(__('flashes.notFound'));
            return redirect()->route('expert-issue.index');
        }
        $clients = Client::get(['id', 'code', 'name']);
        return view('expert-issues.edit', compact('issue', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpertIssueRequest $request, $id)
    {
        $issue = ExpertIssue::find($id);
        
        if (!$issue) {
            error(__('flashes.notFound'));
            return redirect()->route('expert-issue.index');
        }
        $data = $request->validated();
        
        $issue->update($data);

        success(__('flashes.update'));
        return redirect()->route('expert-issue.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issue = ExpertIssue::find($id);
        
        if (!$issue) {
            error(__('flashes.notFound'));
            return redirect()->route('expert-issue.index');
        }

        $issue->delete();

        success(__('flashes.destroy'));
        return redirect()->route('expert-issue.index');
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

        $issues = ExpertIssue::whereBetween('date', [$data['from'], $data['to']])->get();

        return view('expert-issues.dateRange')->with('issues', $issues);
    }
}
