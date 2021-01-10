<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\ReceiptVoucher;
use App\Http\Requests\ReceiptVoucherRequest;

class ReceiptVoucherController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:view receipt-vouchers')->only('index');
        $this->middleware('can:show receipt-voucher')->only('show');
        $this->middleware('can:create receipt-vouchers')->only(['create', 'store']);
        $this->middleware('can:edit receipt-vouchers')->only(['edit', 'update']);
        $this->middleware('can:delete receipt-vouchers')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = ReceiptVoucher::with('client')->paginate(10);
        return view('receipt-vouchers.index')->with('receipts', $receipts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receipt = ReceiptVoucher::find($id);
        
        if (!$receipt) {
            error(__('flashes.notFound'));
            return redirect()->route('receipt-voucher.index');
        }
        return view('receipt-vouchers.show')->with('receipt', $receipt);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get(['id', 'code', 'name']);
        return view('receipt-vouchers.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiptVoucherRequest $request)
    {
        $data = $request->validated();

        $receipt = ReceiptVoucher::create($data);

        success(__('flashes.store'));
        return redirect()->route('receipt-voucher.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipt = ReceiptVoucher::find($id);
        
        if (!$receipt) {
            error(__('flashes.notFound'));
            return redirect()->route('receipt-voucher.index');
        }
        $clients = Client::get(['id', 'code', 'name']);
        return view('receipt-vouchers.edit', compact('receipt', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiptVoucherRequest $request, $id)
    {
        $receipt = ReceiptVoucher::find($id);
        
        if (!$receipt) {
            error(__('flashes.notFound'));
            return redirect()->route('receipt-voucher.index');
        }
        $data = $request->validated();
        
        $receipt->update($data);

        success(__('flashes.update'));
        return redirect()->route('receipt-voucher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receipt = ReceiptVoucher::find($id);
        
        if (!$receipt) {
            error(__('flashes.notFound'));
            return redirect()->route('receipt-voucher.index');
        }

        $receipt->delete();

        success(__('flashes.destroy'));
        return redirect()->route('receipt-voucher.index');
    }
}
