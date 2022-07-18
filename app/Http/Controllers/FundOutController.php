<?php

namespace App\Http\Controllers;

use App\DataTables\FundOut\FundOutDataTable;
use App\Models\FundOut;
use Illuminate\Http\Request;

class FundOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-fund-out')->only('index');
        $this->middleware('permission:delete-fund-out')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FundOutDataTable $dataTable)
    {
        return $dataTable->render('fundout.index');
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
     * @param  \App\Models\FundOut  $fundOut
     * @return \Illuminate\Http\Response
     */
    public function show(FundOut $fundOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundOut  $fundOut
     * @return \Illuminate\Http\Response
     */
    public function edit(FundOut $fundOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundOut  $fundOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundOut $fundOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundOut  $fundOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundOut $fundOut)
    {
        //
    }
}
