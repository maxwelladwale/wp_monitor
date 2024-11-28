<?php

namespace App\Http\Controllers;

use App\Models\SiteInfo;
use App\Http\Requests\StoreSiteInfoRequest;
use App\Http\Requests\UpdateSiteInfoRequest;

class SiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiteInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SiteInfo $siteInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteInfo $siteInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiteInfoRequest $request, SiteInfo $siteInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteInfo $siteInfo)
    {
        //
    }
}
