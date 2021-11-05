<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Information::paginate(10);

        return view('information.index', [
            'information' => $information
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InformationRequest $request)
    {
        $data = $request->all();

        $data['picturePath'] = $request->file('picturePath')->store('assets/information', 'public');

        Information::create($data);

        return redirect()->route('information.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('information.edit',[
            'item' => $information
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InformationRequest $request,Information $information)
    {
        $data = $request->all();

        if($request->file('picturePath')){
            $data['picturePath'] = $request->file('picturePath')->store('assets/information', 'public');
        }

        $information->update($data);

        return redirect()->route('information.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $information->delete();

        return redirect()->route('information.index');
    }
}
