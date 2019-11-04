<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

session_start();

use Auth;
use Session;
use App\User;
use App\Role;

class AdminController extends Controller
{
    //
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    } 

    public function login(Request $request){

        if($request->isMethod('post')){
    
            $data = $request->input();
            $messages = 'Mot de Passe ou email Incorrect';
            $messagess =  "Bienvenue admin."; 
            $message =  "Bienvenue gerant."; 

            
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'role_id'=>'1'])){
    
                //echo "succes"; die;
                return redirect('/messages')->with(['messagess' => $messagess]);
            } 

            elseif(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'role_id'=>'2'])){
    
                //echo "succes"; die;
                return redirect('/messages')->with(['message' => $message]);
            } 
          /*   if (Role::where('nom','admin')->first()->id == Auth::user()->role_id)
        {
            return redirect('/messages')->with(['messagess' => $messagess]);
        }

        if(Role::where('nom', 'gerant')->first()->id == Auth::user()->role_id)
        {
            return redirect('/messagess')->with(['message' => $message]);
        } */
            else{
                //echo "failed"; die;
    
                return redirect('/admin')->with(['messages' => $messages]);  
            }
        }
        return view('auth.connexion');
    }
    
    

    public function admin()
        {
            return view('messages.admin');
        }

    public function gerant()
        {
            return view('messages.gerant');
        }    
    
    public function compte_connecter()
        {
            $roles = Role::all();
            return view('auth.inscription',compact('roles'));
        } 
    
        protected function compte(Request $request)
        
        {
    
            request()->validate([  
    
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',

    
        ]);
            $message = "Votre compte est désormais créé sur la plateforme";
    
            $user = new User(); 
            $user->name = $request->get('name'); 
            $user->email = $request->get('email'); 
            $user->role_id = $request->get('role_id'); 
            $user->password = Hash::make($request->get('password')); 
            if($user->save())
            {
                Auth::login($user);
                return redirect('/messages')->with(['message' => $message]);
    
            }
            else
            {
                flash('user not saved')->error();
    
            }
    
            return redirect('/messages')->with(['message' => $message]);
    
        }
    

}
