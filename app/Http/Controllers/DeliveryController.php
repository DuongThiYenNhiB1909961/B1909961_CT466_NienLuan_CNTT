<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;
use App\Models\Wards;
use App\Models\Feeship;
use Session;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{
    public function delivery(){
        $city = City::orderby('matp','ASC')->get();

    	return view('admin.delivery.add_delivery')->with('city',$city);
    }
    public function select_delivery(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$select_district = District::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
    				$output.='<option>---Chọn quận huyện---</option>';
    			foreach($select_district as $key => $qh){
    				$output.='<option value="'.$qh->maqh.'">'.$qh->name_quanhuyen.'</option>';
    			}

    		}else{

    			$select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
    			$output.='<option>---Chọn xã phường---</option>';
    			foreach($select_wards as $key => $ward){
    				$output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
    			}
    		}
    		echo $output;
    	}
    }
    public function add_delivery(Request $request){
		$data = $request->all();
		//print_r($data);
		$fee = new Feeship();
		$fee->fee_matp = $data['city'];
		$fee->fee_maqh = $data['district'];
		$fee->fee_xaid = $data['wards'];
		$fee->fee_feeship = $data['fee_ship'];
		$fee->save();
	}	
	public function update_delivery(Request $request){
		$data = $request->all();
		$fee_ship = Feeship::find($data['feeship_id']);
		$fee_value = $data['fee_value'];
		$fee_ship->fee_feeship = $fee_value;
		$fee_ship->save();
	}
	 public function select_feeship(){
		$feeship = Feeship::orderby('fee_id','DESC')->get();
		$output = '';
		$output .= '<div class="table-responsive">  
			<table class="table table-bordered">
				<thread> 
					<tr>
						<th>Tên thành phố</th>
						<th>Tên quận huyện</th> 
						<th>Tên xã phường</th>
						<th>Phí ship</th>
					</tr>  
				</thread>
				<tbody>
				';

				foreach($feeship as $key => $fee){

				$output.='
					<tr>
						<td>'.$fee->city->name_city.'</td>
						<td>'.$fee->district->name_quanhuyen.'</td>
						<td>'.$fee->wards->name_xaphuong.'</td>
						<td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.$fee->fee_feeship.'</td>
					</tr>
					';
				}

				$output.='		
				</tbody>
				</table></div>
				';
				
				echo $output;

		
	}
	
    
    

}
