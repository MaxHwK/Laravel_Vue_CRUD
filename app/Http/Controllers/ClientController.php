<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Country;
use App\Http\Requests\FormClientRequest;
use App\Http\Requests\ManageClientRequest;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('country')->get();
    
        return view('clients.index')   
            ->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(ManageClientRequest $request)
    {
        return view('clients.create')
            ->withCountries(Country::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormClientRequest $request, ClientRepository $clientRepository)
    {
        $clientRepository->create($request->only(
            'nom',
            'adresse',
            'cp',
            'ville',
            'pays_id'
        ));
     
        return redirect()->route('clients.index')
            ->with('success','Client has been created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageClientRequest $request
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, ManageClientRequest $request)
    {
        return view('clients.edit',compact('client'))
            ->withCountries(Country::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Client $client
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client, FormClientRequest $request, ClientRepository $clientRepository)
    {
        $clientRepository->update($client, $request->only(
            'nom',
            'adresse',
            'cp',
            'ville',
            'pays_id'
        ));
    
        return redirect()->route('clients.index')
            ->with('success','Client has been updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json([
            'message'=>'Client deleted successfully !',
            'clients'=> Client::with('country')->get()
        ]);
    }
}
