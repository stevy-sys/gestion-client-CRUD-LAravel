<?php

namespace App\Http\Controllers;

use App\Client;
use App\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function __construct(Type $var = null)
    {
       $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->client == "actif") {
            $clients = Client::ClientOfUser()->Actif()->get();
            return view('clients.index',compact('clients'));
        }

        if ($request->client == "inactif") {
            $clients = Client::ClientOfUser()->Inactif()->get();
            return view('clients.index',compact('clients'));
        }

        $clients = Client::where('user_id',Auth::user()->id)->get();
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
        $data["user_id"] = Auth::user()->id;
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
