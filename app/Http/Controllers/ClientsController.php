<?php

namespace App\Http\Controllers;

use App\Client;
use App\Entreprise;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function __construct(Type $var = null)
    {
       $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->client == "actif") {
            $clients = Client::Actif();
            return view('clients.index',compact('clients'));
        }

        if ($request->client == "inactif") {
            $clients = Client::Inactif();
            return view('clients.index',compact('clients'));
        }

        $clients = Client::all();
        return view('clients.index',compact('clients'));
    }
    
    public function create()
    {
        $client = new Client() ;
        $entreprises = Entreprise::all();
        return view('clients.create',compact('entreprises','client'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required|integer',
            'entreprise_id' => 'integer'
        ]);
        
        Client::create($data);
        return redirect('clients/')->with('message','Client ajouter avec success');
    }

    public function show(Client $client)
    {
       return view('clients.show',compact('client'));
    }

    public function edit(Client $client)
    {
        $entreprises = Entreprise::all();
        return view('clients.edit',compact('client','entreprises'));
    }

    public function update(Client $client,Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required|integer',
            'entreprise_id' => 'integer'
        ]);

        $client->update($data);
        return redirect('clients/'.$client->id)->with('message','Client modifier avec success');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/clients')->with('message','Client supprirmer avec success');
    }
}
