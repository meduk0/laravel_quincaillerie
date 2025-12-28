<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;

//use Illuminate\Support\Facades\Storage;
class TestFormController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function verify(Request $request){
        //return redirect(secure_url(route('aform',['success'=>'aa'],false)));
        //$data=$request->except('_token');
        //return view('start', compact('data'));
        
        try{
            $fields=$request->validate(
                [
                    'name' => 'required|min:3',
                    'sname' => 'required|min:3',
                    'age' => "required|integer|min:20|max:60",
                    'genre' => "required|string|in:m,f",
                    'hobbies' => 'array|min:1'
                ]
            );
            $request->input('age');
        }
        catch(Exception $e){
            return back()->with('error',"il faut vérifier votre réponses")
            ->withInput();
        }
            
            //$path=$request->file('meimg')->store('images','public');

            //print_r($fields);
            //dd($request->all());

            return redirect($fields['name']);
    } 

}
