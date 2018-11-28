<?php

/**
 * Short description for file
 *
 * @FileName		Common.php
 * @Created On		14 July 2017
 * @author	        Sandeep vishwakarma <sandeepv803@gmail.com>
 * @copyright		2017-2018 The PHP Group
 * @license		http://www.php.net
 * @Description		Common Helper
 */

namespace App\Helpers;

use DB;
use Mail;
Use Carbon\Carbon;
use DateTime;


class Common {

    /**
     * safe_b64encode for user public profile
     * @param  $string
     * @return $stringrequestQuotationVendorApproved
     */
  
	public static function encodeParam($param)
	{
		$result = '';
		if(!empty($param))
			$result = urlencode(base64_encode($param));
		return $result;
	}
	
	public static function decodeParam($param = NULL)
	{
		if(!empty($param))
			return base64_decode(urldecode($param));
		else
			return 'Wrong input key.';
	}
	
	public static function getBankDetailByPin($pinId) {
		
        $data = DB::table('pincode_state_city_mapping')->where('id','=',$pinId)->first();
        return $data->pincode;
    }
	public static function getBankState($pinId) {
		
        $data = DB::table('pincode_state_city_mapping')->join('states','pincode_state_city_mapping.state_id','=','states.id')->where('pincode_state_city_mapping.id','=',$pinId)->first();
        return $data->name;
    }
	public static function getBankCity($pinId) {
		
        $dataCity = DB::table('pincode_state_city_mapping')->join('cities','pincode_state_city_mapping.city_id','=','cities.id')->where('pincode_state_city_mapping.id','=',$pinId)->first();
        return $dataCity->name;
    }
	public static function getLocationArea($pinId) {
		
        $dataCity = DB::table('pincode_state_city_mapping')->select('pincode_state_city_mapping.area_location')->where('pincode_state_city_mapping.id','=',$pinId)->first();
        return $dataCity->area_location;
    }
    public static function checkUserDetail($userid) {

        $dataUser =  DB::table('user_profiles')->where('user_id','=',$userid)->select('id')->first();
        if(!empty($dataUser->id)){
            $data=$dataUser->id;
        }else{
            $data=0;
        }
        return $data;
    }
	public static function setServiceNameAndMaxAndMinPrice($service_ids=NULL,$serviceNameArray=NULL){
	    $data = array();
	    $k=0;
	    $name = '';
	    $min_price = 0;
	    $max_price = 0;
        $service_ids = explode(',',$service_ids);
	    if(($service_ids !='') && (!empty($serviceNameArray)))
        {
            foreach($serviceNameArray as $services){
                foreach($service_ids as $key=>$value){
                    if($services['id']==$value){
                        $k++;
                        $colorCode = '#bf'.rand(100, 999).'!important';
                        $name .= "<span class = 'btn btn-info btn-sm' style='background-color: ".$colorCode."'>".$services['name']."</span> ";
                        $min_price += $services['min_price'];
                        $max_price += $services['max_price'];
                    }
                }
            }
            $data = $serviceNameArray;
        }

        $data['servicename'] = substr($name,0,-1);
        $data['min_price'] = $min_price;
        $data['max_price'] = $max_price;
	   return $data;
	}
    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

	public static function setAssetsNameAndCost($company_assets_ids=NULL,$assetsArray=NULL)
	{
		$data = array();
	    $k=0;
	    $name = '';
	    $cost = 0;
        $company_assets_ids = explode(',',$company_assets_ids);
	    if(($company_assets_ids !='') && (!empty($assetsArray)))
        {
			foreach($assetsArray as $services){
				foreach($company_assets_ids as $key=>$value){
					if($services['id']==$value){
						$k++;
						$colorCode = '#bf'.rand(100, 999).'!important';
						$name .= "<span class = 'btn btn-info btn-sm' style='background-color: ".$colorCode."'>".$services['name']."</span> ";
						$cost += $services['cost'];
					}
				}
			}
		}
		$data['assetsName'] = substr($name,0,-1);
        $data['cost'] = $cost;
		return $data;
	}
	public static function setServiceNameAndMaxPrice($service_group_id=NULL)
		{
		$service_group_id=2;
		$data = DB::table('servicegroupmappings')->select('services.name','services.max_price')->join('services','servicegroupmappings.service_id','=','services.id')->where('servicegroupmappings.service_group_id','=',$service_group_id)->get();
			return $data;
		}

	public static function setServiceNameAndDocList($service_group_id=NULL)
		{
		$service_group_id=2;
		$data = DB::table('servicegroupmappings')->select('services.name','services.doc_name')->join('services','servicegroupmappings.service_id','=','services.id')->where('servicegroupmappings.service_group_id','=',$service_group_id)->get();
			return $data;
		}


    
}
