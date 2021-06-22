<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SourceProviders;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
class SourceProviderController extends Controller
{
    public function __construct()
	{
		
	}

	public function index(Request $request){				
		$data = SourceProviders::Provider($request->search)->paginate(5);					
		return view("sources.providers.index")->with('data', $data);
	}	

	public function create(Request $request){
		$validate = $this->validate($request,[
            'sp-name-short' => 'required|max:5|min:3',
            'sp-name' => 'unique:App\Models\SourceProviders,name|required|max:50',
			]
		);

		$sp = new SourceProviders();
        $sp->user_create = Auth()->user()->id;
		$sp->short_name = $request->input('sp-name-short');
		$sp->name = $request->input('sp-name');
		$sp->save();     

        \Toastr::success('Registro guardado correctamente','Proveedores');
        return redirect()->route('source.provider.index');		
	}

	public function update(Request $request){					
		$validate = $this->validate($request,[
			'sp-name-short' => 'required|max:5|min:3',
			'sp-name' => 'required|unique:App\Models\SourceProviders,name,'. $request->input('sp-id') . ',id'
			]
		);
		SourceProviders::where('id','=',$request->input('sp-id'))->update(['name' => $request->input('sp-name'), 'short_name' => $request->input('sp-name-short'), 'user_update' => Auth()->user()->id ]);		
         \Toastr::success('Se modificó correctamente','Proveedores');
        return Redirect::back();

	}

	public function edit(Request $request){
    	if ($request->input('sp-id')){
            return $this->update($request);              
        }else{
    	    return $this->create($request);            
        }        
	}

	public function delete($id){
    	if(SourceProviders::find($id) == true){
    		SourceProviders::where('id','=',$id)->delete();
    		\Toastr::success('Se eliminó correctamente','Proveedores');
    	}else{
    		\Toastr::error('No se encontro el dato','Proveedores');
    	};

        return Redirect::back();
	}
}
