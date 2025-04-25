<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

  public function __construct(){
    //$this->middleware('auth');
  }
  public function index()
  {
 $profiles = Profile::paginate(9);
 return view('profile.index',compact('profiles'));
   
  }
  public function show(Profile $profile){
    //$id=(int)$request->id;
    //$profile = Profile::findOrFail($id);
    
return view('profile.show',compact('profile'));
  }
    public function create(){
      return view('profile.create');
    }


    public function store(ProfileRequest $request)
    {
        // Valide les champs
        $formFields = $request->validated();
    
        // Gérer l'upload de l'image
        $formFields['image']=$request->file('image')->store('profile','public');
        
    
        // Hash du mot de passe
        $formFields['password'] = Hash::make($request->password);
    
        // Insertion dans la base
        Profile::create($formFields);
        $formFields['image']= $this->uploadImage($request);
        return redirect()->route('profiles.index')->with('success', 'Votre compte a bien été créé');
    }
    



    public function destroy(Profile $profile){
      $profile->delete();

      return to_route('profiles.index')->with('success','profile a bien ete supprimer');
    }
    public function edit( Profile $profile){
      return view('profile.edit' ,compact('profile'));
    }
    public function update( ProfileRequest $request ,Profile $profile){
      $formFields = $request->validated();
      $formFields['password'] = Hash::make($request->password);
      $formFields['image']= $this->uploadImage($request);
      $profile->fill( $formFields)->save();
      
     

      return to_route('profiles.show',$profile->id)->with('success','profile a bien ete modifier');
    }
    private function uploadImage(ProfileRequest $request){
      if($request->hasFile('image')){
        return  $request->file('image')-> store('profile','public');
        }
      }   
}


