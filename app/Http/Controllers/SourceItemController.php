<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SourceItems;
use Validator;
use Illuminate\Support\Facades\View;
use App\Models\SourceFields;

class SourceItemController extends Controller
{

	public function __construct(){		
	}

	public function view(){
	   return view('layouts.base');
	}

	public function index(Request $request){		
        $data = SourceItems::Item($request->search)->paginate(5);		
        return view("sources.items.index")->with('data',$data)->with(['title' => 'Buscar item']);
	}	

	public function create(Request $request){	        
	   $validate = $this->validate($request,[
            'barcode' => 'required|max:13|min:12'
       ]);       

        if (SourceItems::where('ean', '=',$request->barcode)->exists()) {
           \Toastr::error('Este registro ya se encuentra en la base de datos','Items');
	       return redirect()->route('source.item.index');
        }

		$response = $this->curl('http://live.icecat.biz/api/?UserName=alekzleon&Language=en&GTIN='.$request->barcode);

		if ($response->httpCode == 200) {
			$nodeJson = $this->recursiveJson($response->body->data->GeneralInfo);
			$json=$response->body->data;
			$item = new SourceItems();
			$item->source_providers_id='1';
			$item->json = json_encode($json);
			$item->ean = $request->barcode;
			$item->save();
			\Toastr::success('Registro guardado exitosamente','Items');
			return redirect()->route('source.item.index');
		}

		\Toastr::warning('Registro no encontrado en Icecat','Items');
		return redirect()->route('source.item.index');
	}	

	function curl($url = null)
	{
		$curl_options = [
			CURLOPT_HTTPHEADER => array('x-format-new:true'),
	        CURLOPT_USERAGENT => "MELI-PHP-SDK-1.0.0", 
	        CURLOPT_MAXCONNECTS => 900 ,
	        CURLOPT_SSL_VERIFYPEER => false,
	        CURLOPT_CONNECTTIMEOUT => 0, 
	        CURLOPT_RETURNTRANSFER => 1, 
	        CURLOPT_TIMEOUT => 0,
		];

		$ch = curl_init($url);
		curl_setopt_array($ch, $curl_options);
		$return = new \stdClass();
		$return->body = json_decode(curl_exec($ch), false);
		$return->httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return $return;
	}

	public function recursiveJson($array = [])
	{
		$response = \SourceField::recursive($array);
		foreach ($response as $value) {
			if (SourceFields::where('source_provider_field', '=',$value)->exists()) {				
			}else{
				$fields = new SourceFields();				
                $fields -> user_create = Auth()->user()->id;
                $fields -> source_provider_id = 1;
				$fields -> source_provider_field = $value;
                $fields -> mercadocontrol_field = 'VALUE';
				$fields->save();
			}
		}		
	}

}

