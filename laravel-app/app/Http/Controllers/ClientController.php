<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);

    }

    public function store(Request $request)
    {
        // Criação do cliente
        $client = Client::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return response()->json(['message' => 'Client created successfully', 'client' => $client]);
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return response()->json(['message' => 'Client updated successfully', 'client' => $client]);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(['message' => 'Client deleted successfully']);

    }

    public function dashboard()
    {
        $clientId = 2;

        return view('create-clients', ['clientId' => $clientId]);
    }

    public function dashboardEdit()
    {

        $client = 3;
        $name = 'Testando';
        $email = 'edit@edit.com';
        $phone = '31999998888';

        return view('update-clients', [
            'client' => $client,
            'name'     => $name,
            'email'    => $email,
            'phone'    => $phone,
        ]);
    }
}
