<?php

namespace App\Http\Controllers;

use App\Models\Tudu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuduController extends Controller
{
    //the user must be authenticated first to access auth routes
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createtudu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string|max:255',
            'description'=>'nullable|string'
        ]);

        $tudu = new Tudu();

        $tudu->title = $request->input('title');
        $tudu->description = $request->input('description');
        $tudu->user_id = Auth::user()->id;

        $tudu->save();

        return back()->with('success', 'Tudu successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tudu = Tudu::where('id', $id)->where('user_id', Auth::user()->id)->first();
        
        return view('tududetails', compact('tudu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tudu = Tudu::where('id', $id)->where('user_id', Auth::user()->id)->first();

        return view('edittudu', compact('tudu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'chkbox-iscompleted'=>'nullable|string'
        ]);

        $tudu = Tudu::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $tudu->title = $request->input('title');
        $tudu->description = $request->input('description');
        
        if($request->input('chkbox-iscompleted')) {
            $tudu->iscompleted = true;
        }

        $tudu->save();

        return redirect()->route('tudu.show', $tudu->id) ->with('success', 'Tudu successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tudu = Tudu::where('id', $id)->where('user_id', Auth::user()->id)->first();

        $tudu->delete();
        return redirect('/home')->with('success', 'Tudu successfully removed');
    }

    public function deleteconfirm(string $id)
    {
        $tudu = Tudu::where('id', $id)->where('user_id', Auth::user()->id)->first();

        return view('confirmdelete', compact('tudu'));
    }
}
