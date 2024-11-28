<?php

namespace App\Http\Controllers;

use App\Models\ClientInfo;
use App\Http\Requests\StoreClientInfoRequest;
use App\Http\Requests\UpdateClientInfoRequest;
use App\Models\PluginInfo;

class ClientInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = ClientInfo::paginate(1);
        return view('clients', compact('clients'));
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
    public function store(StoreClientInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientInfo $clientInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientInfo $clientInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientInfoRequest $request, ClientInfo $clientInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientInfo $clientInfo)
    {
        //
    }
}
