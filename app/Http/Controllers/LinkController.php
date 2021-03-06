<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LinkRequest;
use App\Http\Requests\CreateLinkRequest;

use App\Link;

use Auth;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('not_owner', ['only' => ['edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $links = Link::orderBy('created_at', 'desc')->get();

        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $link = new Link;

        return view('links.create', compact('link'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateLinkRequest $request)
    {
        $link = Auth::user()->links()->create($request->all());

        flash()->success('The link has been created successfully.');

        return redirect()->route('home');
    }

    public function show(Link $link)
    {
        return view('links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Link  $link
     * @return Response
     */
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Link  $link
     * @return Response
     */
    public function update(Link $link, LinkRequest $request)
    {
        $link->update($request->all());

        flash()->success('Your link has been edited successfully.');

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Link  $link
     * @return Response
     */
    public function destroy($link)
    {
        $link->delete();

        flash()->success('This link has been deleted successfully.');
        
        return redirect()->route('home');
    }
}
