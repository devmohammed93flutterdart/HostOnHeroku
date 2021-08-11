<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class ResultController extends BaseController
{

    

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $results = Result::all();
        return view('results.index')->with('results', $results);
    }

    public function resultsTrashed() {

        $trashed = Result::onlyTrashed()->get();
        return view('results.trashed')->with('results', $trashed);

    }
   
    public function create()
    {
        return view('results.create');
    }



    public function store(Request $request)
    {

        
        $this->validate($request, [
            'res_photo' => 'required|image',
        ]);

        $res_photo = $request->res_photo;
        $newres_Photo = time().$res_photo->getClientOriginalName();
        $res_photo->move('uploads/results', $newres_Photo);

        $result = Result::create([
            'user_id' => Auth::id(),
            'res_photo' => 'uploads/results/'.$newres_Photo,
        ]);

        return redirect()->back(); 


    }

   
    public function show($id)
    {
        $result = Result::where('id', $id)->first();
        return view('results.show')->with('result', $result);
    }

  


   

    
    public function destroy($id)
    {

        $result = Result::where('id', $id)->where('user_id', Auth::id())->first();
        if($result === null) {
            return redirect()->back(); 
        }
        $result = Result::find($id);

        $result->delete();
        
        return redirect()->back(); 

    }

    
    public function hdelete($id)
    {
        $result = Result::withTrashed()->where('id' ,$id)->first();

        $result->forceDelete();

        return redirect()->back(); 

    }


}
