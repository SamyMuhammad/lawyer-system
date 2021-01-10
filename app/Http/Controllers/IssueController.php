<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\IssueRequest;
use Illuminate\Database\Eloquent\Builder;

class IssueController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:view issues')->only(['index', 'search']);
        $this->middleware('can:show issue')->only('show');
        $this->middleware('can:create issues')->only(['create', 'store']);
        $this->middleware('can:edit issues')->only(['edit', 'update']);
        $this->middleware('can:delete issues')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::with('client')->paginate(10);
        return view('issues.index')->with('issues', $issues);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issue = Issue::find($id);
        
        if (!$issue) {
            error(__('flashes.notFound'));
            return redirect()->route('issue.index');
        }
        return view('issues.show')->with('issue', $issue);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get(['id', 'code', 'name']);
        return view('issues.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IssueRequest $request)
    {
        $data = $request->validated();

        $issue = Issue::create($data);

        success(__('flashes.store'));
        return redirect()->route('issue.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issue = Issue::find($id);
        
        if (!$issue) {
            error(__('flashes.notFound'));
            return redirect()->route('issue.index');
        }

        $clients = Client::get(['id', 'code', 'name']);
        return view('issues.edit', compact('issue', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IssueRequest $request, $id)
    {
        $issue = Issue::find($id);
        
        if (!$issue) {
            error(__('flashes.notFound'));
            return redirect()->route('issue.index');
        }
        $data = $request->validated();
        
        $issue->update($data);

        success(__('flashes.update'));
        return redirect()->route('issue.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issue = Issue::find($id);
        
        if (!$issue) {
            error(__('flashes.notFound'));
            return redirect()->route('issue.index');
        }

        $issue->delete();

        success(__('flashes.destroy'));
        return redirect()->route('issue.index');
    }

    /**
     * Search in issues.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if (!$request->filled('input')) {
            return redirect()->route('issue.index');
        }
        $input = $request->input;

        $columns = [
            'issue_number', // رقم القضية
            'issue_court_code', // الرقم الآلي للقضية في المحكمة
            'opponent_name',
            'court_name',
            'type', // نوع الدعوى
            'subject',
            // 'issue_date',
            // 'session_date',
            'opponent_description', // صفة الخصم
            'previous_decision',
            'issue_status',
            'contract_value',
        ];
        $query = Issue::query();
        foreach($columns as $column){
            $query->orWhere($column, 'LIKE', '%' . $input . '%');
        }
        $query->orWhereHas('client', function (Builder $q) use($input){
            $q->where('code', 'LIKE', '%' . $input . '%');
            $cols = ['name', 'civil_number', 'phone', 'description', 'address', 'job', 'nationality',];
            foreach ($cols as $col) {
                $q->orWhere($col, 'LIKE', '%' . $input . '%');
            }
        });
        $issues = $query->paginate(10);
        return view('issues.index')->with('issues', $issues);
    }
}
