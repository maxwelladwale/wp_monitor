<?php

namespace App\Http\Controllers\clients;

use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\ClientInfo;
use Illuminate\Http\Request;

class clienttables extends Controller
{
    public function index()
    {
        return view('clients.index');  // Your view with the DataTable
    }

    public function getClients(Request $request)
    {
        $clients = ClientInfo::query();  // Query to get all clients

        // If you need to apply additional filters or conditions, do so here.

        // Return data to DataTables
        return DataTables::of($clients)
            ->addColumn('actions', function ($client) {
                return view('clients.partials.actions', compact('client'));  // You can return a custom action button or HTML here
            })
            ->make(true);
    }
}
