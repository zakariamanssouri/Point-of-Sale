<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        //assuming the user is authenticated
        $this->middleware('auth');

        //middelwares for permissions
        $this->middleware(['permission:create_clients'])->only('create');
        $this->middleware(['permission:read_clients'])->only('read');
        $this->middleware(['permission:update_clients'])->only('edit');
        $this->middleware(['permission:delete_clients'])->only('delete');
    }

    public function index(Request $request)
    {
        //this is used for search
        //we can search by : first_name , last_name , and email:
        if ($request->search) {
            //if the search for something then return the result
            $clients= Client::where('name', 'LIKE', '%' . $request->search . "%")
                ->orWhere('address', 'LIKE', '%' . $request->search . "%")
                ->paginate(5);
            return view('app.clients.index', compact('clients'));
        }

        $clients = Client::paginate(5);
        return view('app.clients.index',compact('clients'));

    }


    public function create()
    {
        return view('app.clients.create');
    }


    public function store(Request $request)
    {
        //this methode used for create new clients


        //validate the request
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'address' => ['string', 'max:255'],
            'phone' => ['string', 'max:30'],
        ]);

        $client = Client::create($request->all());
        $title = "le client " . $client->name. " a été créé avec succès ";

        //show the notification
        toast($title, 'success');
        return redirect()->route('clients.index');
    }



    public function edit(Client $client)
    {
        return view('app.clients.edit', compact('client'));
    }


    public function update(Request $request, Client $client)
    {
        //find the client wich we want to update
        $client = Client::findOrFail($request->id);

        //validate the request
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'address' => ['string', 'max:255'],
            'phone' => ['string', 'max:30'],
        ]);

        $client->update($request->all());

        //notify that the user is created successfully
        $title = "le client " . $request['name']. " a été modifié";
        toast($title, 'success');

        //end
        return redirect(route('clients.index'));
    }


    public function destroy($id)
    {
        /*find the client*/
        $client = Client::findOrFail($id);

        /*delete the category*/
        $client->delete();

//        notify the user
        $title = "le client " . $client->name . " a été supprimé";
        toast($title, 'success');
        return redirect(route('clients.index'));

    }
}
