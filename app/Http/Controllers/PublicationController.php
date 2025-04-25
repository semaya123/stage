<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    public function __construct(){
        //$this->middleware("auth")->excpt('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $publications= Publication::latest()->get();   
     return view("publication.index",compact("publications"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("publication.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
         
        $formFields = $request->validated();
        $this->uploadImage($request, $formFields);
        $formFields['profile_id']= Auth::id();
        Publication::create($formFields);
       return to_route('publications.index')->with('success','Le publication a ete bien ajouter');
    }

    private function uploadImage(PublicationRequest $request,array &$formFields){
        unset($formFields["image"]);
        if($request->hasFile('image')){
            $formFields['image']=$request->file('image')->store('publication','public');
          }
        }
    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication,Request $request)
    {
        //authorisation  Gate(Route)   policies(controller)
         Gate::authorize('update', $publication);
       
        return view('publication.edit',compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        Gate::authorize('update-publication',$publication);

        $formFields = $request->validated();
        $this->uploadImage($request, $formFields);
        $publication->fill($formFields)->save();
        
        return to_route('publications.index')->with('success','Le publication a ete bien modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return to_route('publications.index')->with('success','publication a ete bien supprimee');
    }
}
