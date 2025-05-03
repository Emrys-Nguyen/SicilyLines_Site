<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;//a rajouter
use Illuminate\Http\Request;
use App\Http\Requests\FerryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\{Equipement,Ferry};


class FerryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ferrys= DB::table("ferrys")->get();//a rajouter
        return view('ferry',compact('ferrys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipements = DB::table("equipements")->get();
        return view('create', compact("equipements"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FerryRequest $ferryRequest):RedirectResponse
    {
        $ferry = new Ferry();
        $ferry -> nom=$ferryRequest->input('nom');
        if($ferryRequest->hasFile('photo')){
            $ferryRequest->file('photo')->getPathname();
            $photoName=time().'.'.$ferryRequest->photo->extension();
            $ferryRequest->photo->move(public_path('photos'),$photoName);
            $ferry->photo=$photoName;
        }
        $ferry -> longueur=$ferryRequest->input('longueur');
        $ferry -> largeur=$ferryRequest->input('largeur');
        $ferry -> vitesse=$ferryRequest->input('vitesse');


      
        $ferry->save();
        return redirect()->route('ferry.index')->with('info',"le ferry a bien été crée");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ferry $ferry) : View
    {
        $ferry->with("equipements")->get();
        return view("showFerry", compact('ferry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ferry $ferry)
    {
        $ferry->delete();
        return back()->with('info','le ferry a été supprimé');
    }
}
