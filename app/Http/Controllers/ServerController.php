<?php

namespace App\Http\Controllers;

use App\Jobs\DestroyServer;
use App\Jobs\PauseServer;
use App\Server;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Queue\Jobs\Job;
use Prologue\Alerts\Facades\Alert;

class ServerController extends Controller
{
    use DispatchesJobs;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::all();

        return view('server.index')->with('servers', $servers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $server = Server::find($id);

        return view('server.show')->with('server', $server);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function pause($id)
    {
        $server = Server::find($id);

        if ($server) {
            $this->dispatch(new PauseServer($server));
        }

        Alert::info('Server will pause')->flash();

        return redirect(route('server.show', ['id' => $server->id]));

    }

    public function resume($id)
    {
        $server = Server::find($id);

        if ($server) {
//            $this->dispatch(new ResumeServer($server));
        }
        Alert::info('Server will resume')->flash();

        return redirect(route('server.show', ['id' => $server->id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $server = Server::find($id);

        if ($server) {
            $this->dispatch(new DestroyServer($server));
            Alert::info('Server will be destroyed')->flash();
        } else {
            Alert::warning('Server not found');
        }

        return redirect(route('server.index'));
    }
}
