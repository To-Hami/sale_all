<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ClientRequest;
use App\Models\Client;
use App\Models\User;
use App\Models\Source;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Activitylog\Models\Activity;


class ClientController extends Controller
{

    public function data(){
        $clients = Client::select();

        return DataTables::of($clients)
            ->addColumn('actions', 'admin.clients.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    }
    public function index()
    {
        $clients = Client::paginate(4);
        return view('admin.clients.index',compact('clients'));
    }

    public function create()
    {
         $sources = Source::all();
        $users = User::all();
        return view('admin.clients.create',compact(['users','sources']));
    }

    public function store(ClientRequest $request)
    {
        Client::create($request->all());
        session()->flash('success', __('site.created_succufully'));

        return redirect()->route('admin.clients.index');
    }

    public function edit(Client $client)
    {
        $sources = Source::all();
        $users = User::all();
        return view('admin.clients.edit',compact(['client','users','sources']));
    }

    public function update(ClientRequest $request ,Client $client)
    {
        $client->update($request->validated());
        session()->flash('success', __('site.Updated_succufully'));

        return redirect()->route('admin.clients.index');

    }


    public function bulkDelete(){

    }

    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('success', __('site.dleted_succufully'));

        return redirect()->route('admin.clients.index');

    }

    public function archive(){
        $clients = Client::onlyTrashed()->paginate(5);
        return view('admin.clients.archive',compact('clients'));
    }


    // activity 

    public function activity(){

        
        $activities = activity::all();
        return $activities;

      
    }
}
