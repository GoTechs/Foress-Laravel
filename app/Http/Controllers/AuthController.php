<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;

class AuthController extends Controller
{

    public function create (){
        return view('inscription');
    }

    public function store (Request $request){

        $this -> validation($request);
        $nom = $request->nom;
        $prenom = $request->prenom;
        $adresse = $request->adresse;
        $phone = $request->phone;
        $email = $request->email;
        $username = $request->username;
        $request['password']= bcrypt($request->password);
        Users::create($request->all());

        return redirect('connexion')->with('message','Inscription réussie : Connectez-vous pour ajouter des annonces');
    }

    public function validation($request){
        $request->validate([
            "nom" => "required|string",
            "prenom" => "required|string",
            "adresse" => "nullable|string",
            "email" => "nullable|email|max:255|unique:users",
            "phone" => "nullable",
            "username" => "required|min:6|max:55",
            "password" => "required|min:6|max:55",
            "confirmPassword" => "required|same:password",

            ]);
    }

    public function connexion(){
        return view('connexion');
    }

    public function checklogin(Request $request){

        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt([
            'username'=> $username,
            'password'=> $password
        ]))
        {
            return view('profil.home');
        } else {
            return redirect()->back()->with('error', 'Nom d\'utilisateur ou mot de passe invalide.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/connexion');
    }

}
