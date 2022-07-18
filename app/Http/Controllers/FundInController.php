<?php

namespace App\Http\Controllers;

use App\DataTables\FundIn\FundInDataTable;
use App\Models\FundIn;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class FundInController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-fund-in')->only('index');
        $this->middleware('permission:delete-fund-in')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(FundInDataTable $dataTable)
    {
        return $dataTable->render('fundin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param FundIn $fundIn
     * @return Response
     */
    public function show(FundIn $fundIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FundIn $fundIn
     * @return Response
     */
    public function edit(FundIn $fundIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param FundIn $fundIn
     * @return Response
     */
    public function update(Request $request, FundIn $fundIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FundIn $fundIn
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(FundIn $fundIn): Application|RedirectResponse|Redirector
    {
        $fundIn->delete();
        return redirect(route('fund-ins.index'));
    }
}
