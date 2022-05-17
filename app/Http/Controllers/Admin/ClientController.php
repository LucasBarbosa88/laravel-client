<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('needsRole:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Clients';

        $clients = Client::paginate(10);

        return view('admin/clients.index', compact('title', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required',
        ]; 

        if($request->validate($rules)){
            $client = Client::createClient($request->name, $request->email, $request->phone);

            if($client){
                return redirect()->back()->with('success' ,'Client created with success!');
            } else {
                return redirect()->back()->with('danger', 'Not possible create this Client! Try again.');
            }
        }
        return redirect()->back()->with('danger', 'Not possible create this Client! Try again.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $rules = [
            'name' => 'required',
        ];

        if($request->validate($rules)){
            $client = Client::updateClient($request->id, $request->name, $request->email, $request->phone);

            if($client) {
                return redirect()->back()->with('success', 'Client update with success!');
            } else {
                return redirect()->back()->with('danger', 'Not possible update this Client! Try again.!');
            }
        }

        return redirect()->back()->with('danger', 'Not possible update this Client! Try again.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if($client) {
            $client->delete();

            return redirect()->back()->with('success', 'Client deleted with success!');
        }
    }
}
