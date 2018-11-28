<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;
use App\UserDetail;
use App\UserProfile;

use App\UserType;
use App\Department;
use App\Designations;
use App\Specialization;
use App\BandLevel;
use App\IndustrialExposureLevel;
use App\Cluster;
use App\Zone;
use App\BankDetail;
use App\UserAttachment;
use Session;
use Auth;
use Image;
use App\CompanyAsset;
use App\UserAsset;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 protected $redirectTo = '/dashboard';
	 protected $breadcrumb = array('list'=>'Users','register'=>'Add New User');
	 protected $listing = array('/register'=>'Add New User');
	 protected $page_title = 'Add User';
	 
	 public function __construct()
    {
        $this->middleware('auth');
    }
	 
    public function index()
    {
     $userdetails = User::join('user_details', 'user_details.user_id', '=', 'users.id')
	                    ->select('users.*','user_details.*')
	                    ->where('user_details.main_user_type', '!=','NULL')						 
						 ->paginate($this->rowPerPage);
						 
						 
						 
						 
     return view('admin.user.list_user')
				->with('page_title',$this->page_title)
				->with('breadcrumb',$this->breadcrumb)
				->with('listing',$this->listing)
                ->with('userdetail',$userdetails ); 
    }
	 public function getUserListData()
    {

     $userdetails = User::orWhere('user_type_id', '=',1)
						 ->orWhere('user_type_id', '=',2)
						 ->orWhere('user_type_id', '=',3)
						 ->orWhere('user_type_id', '=',4)
						 ->paginate($this->rowPerPage);
						 
     return view('admin.user.get_list_user')
				->with('page_title',$this->page_title)
				->with('breadcrumb',$this->breadcrumb)
				->with('listing',$this->listing)
                ->with('userdetail',$userdetails ); 
    }
     public function addUser()
     {
     $userType= UserType::pluck('name','id');
     $userDepartment= Department::pluck('name','id');
     $userSpecialization= Specialization::pluck('name','id');
     $userDesignation= Designations::pluck('name','id');
     $userBand= BandLevel::pluck('name','id');
     $industrialExposure= IndustrialExposureLevel::pluck('employee_level','id');
     $zoneAssigned= Zone::pluck('name','id');
     $clusterAssigned= Cluster::pluck('name','id');
     //die($userBand);
     return view('admin.user.add_user')
				->with('page_title',$this->page_title)
				->with('breadcrumb',$this->breadcrumb)
				->with('listing',$this->listing)
				->with('userDepartment',$userDepartment)
				->with('userSpecialization',$userSpecialization)
				->with('userDesignation',$userDesignation)
				->with('userBand',$userBand)
				->with('industrialExposure',$industrialExposure)
				->with('zoneAssigned',$zoneAssigned)
				->with('clusterAssigned',$clusterAssigned)
				->with('userType',$userType);  
    }
	public function registerUser()
     {
     $userType= UserType::pluck('name','id');     
     return view('admin.user.register_user')
				->with('page_title',$this->page_title)
				->with('breadcrumb',$this->breadcrumb)
				->with('userType',$userType);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addUserDetail(Request $request,$id)
    {
     //echo $id;exit;
	 $userData= User::with('userDetails')->where('id','=',$id)->first();
	 
	 $userType= UserType::pluck('name','id');
     $userDepartment= Department::pluck('name','id');
     $userSpecialization= Specialization::pluck('name','id');
     $userDesignation= Designations::pluck('name','id');
     $userBrand= BandLevel::pluck('name','id');
     $industrialExposure= IndustrialExposureLevel::pluck('employee_level','id');
     $zoneAssigned= Zone::pluck('name','id');
     $clusterAssigned= Cluster::pluck('name','id');
     
     return view('admin.user.add_details')
				->with('page_title',$this->page_title)
				->with('breadcrumb',$this->breadcrumb)
				->with('userDepartment',$userDepartment)
				->with('userSpecialization',$userSpecialization)
				->with('userDesignation',$userDesignation)
				->with('userBrand',$userBrand)
				->with('industrialExposure',$industrialExposure)
				->with('zoneAssigned',$zoneAssigned)
				->with('clusterAssigned',$clusterAssigned)
				->with('userType',$userType)
				->with('userData',$userData);
    }
	 public function addAssUserDetail(Request $request,$id)
    {
     //echo $id;exit;
	 $userData= User::with('userDetails')->where('id','=',$id)->first();
	 
	 $userType= UserType::pluck('name','id');
     $userDepartment= Department::pluck('name','id');
     $userSpecialization= Specialization::pluck('name','id');
     $userDesignation= Designations::pluck('name','id');
     $userBrand= BandLevel::pluck('name','id');
     $industrialExposure= IndustrialExposureLevel::pluck('employee_level','id');
     $zoneAssigned= Zone::pluck('name','id');
     $clusterAssigned= Cluster::pluck('name','id');
     
     return view('admin.user.add_asso_details')
				->with('page_title',$this->page_title)
				->with('breadcrumb',$this->breadcrumb)
				->with('userDepartment',$userDepartment)
				->with('userSpecialization',$userSpecialization)
				->with('userDesignation',$userDesignation)
				->with('userBrand',$userBrand)
				->with('industrialExposure',$industrialExposure)
				->with('zoneAssigned',$zoneAssigned)
				->with('clusterAssigned',$clusterAssigned)
				->with('userType',$userType)
				->with('userData',$userData);
    }
	 public function saveUserDetails(Request $request)
    {
		
		//echo '<pre>';print_r($request->all());exit;
		  $validateData = array(         
          'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        );
        $this->validate($request, $validateData);


		
			/*------------------------INPUT START------------------------------*/
			$fathername = $request->fathername;	
			$mothername = $request->mothername;	
			$siblings = $request->siblings;	
			$gender = $request->gender;	
			$marital = $request->marital;	
			$kids = $request->kids;	
			$doj = $request->doj;	
			$joiningage = $request->joiningage;	
			$expreince = $request->expreince;	
			$paddress = $request->paddress;	
			$ppin = $request->ppin;	
			$currentaddress = $request->currentaddress;	
			$currentpin = $request->currentpin;	
			$mobile = $request->mobile;	
			$altmobile = $request->altmobile;	
			$collagename = $request->collagename;	
			$caddress = $request->caddress;	
			$cpin = $request->cpin;
			$referencesdata = $request->references;	
			$referencename = $request->referencename;	
			$relationship = $request->relationship;	
			$contactname = $request->contactname;	
			$contactaddress = $request->contactaddress;	
			$contactpin = $request->contactpin;	
			$jobarea = $request->jobarea;	
			$userrole = $request->userrole;	
			$empid = $request->empid;	
			$user_department = $request->user_department;	
			$user_specialization = $request->user_specialization;	
			$user_band = $request->user_band;	
			$user_designation = $request->user_designation;	
			$user_assest = $request->user_assest;	
			$user_exposure = $request->user_exposure;				
			$user_zone = $request->user_zone;				
			$user_cluster = $request->user_cluster;				
			$cugmobile = $request->cugmobile;				
			$letter = $request->letter;				
			$personalaccount = $request->personalaccount;							
			$personaltype = $request->personaltype;				
			$ifsc = $request->ifsc;				
			$salaryaccount = $request->salaryaccount;				
			$pancard = $request->pancard;				
			$aadhar = $request->aadhar;				
			$passport = $request->passport;				
			$salaryamount = $request->salaryamount;				
			$tds = $request->tds;				
			$advance = $request->advance;				
			$deductions = $request->deductions;				
			$reimbursements = $request->reimbursements;				
			$incentives = $request->incentives;				
			$totalsalary = $request->totalsalary;				
			$gst = $request->gst;				
			$userId = $request->userId;	
            /*------------------------INPUT END------------------------------*/			
			

            $duplication=UserProfile::where('user_id','=',$userId)->select('id')->first();

            if(!empty($duplication->id)){
			
             Session::flash('alert-danger', 'User details already completed!');
		     return redirect('list');
			
             }else{
			
			$dataProfile = new UserProfile;
			$dataProfile->user_id = $userId;
			$dataProfile->fathername = $fathername;
			if (!empty($request->profile_pic)) { // Check null image
          //Image uploader plugin save            
          $fileextenstion = $request->file('profile_pic')->getClientOriginalExtension();
          $full_file_name = ($request->file('profile_pic')->getClientOriginalName());
          $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

          //Thumb
          $photo = $request->file('profile_pic');
          $thumbPath = base_path() . '/public/images/profile';
          $thumb_img = Image::make($photo->getRealPath());
          // resize the image to a width of 200 and constraint aspect ratio (auto height)
          $thumb_img->resize(300, null, function ($constraint) {
              $constraint->aspectRatio();
          });
          //$dataProfile->save($thumbPath . '/' . $fileName, 80);
          //Original Image
          $destinationPath = base_path() . '/public/images/profile';
          $photo->move($destinationPath, $fileName);

          $image_url = $request->profile_pic;
          if (!empty($image_url)) {
              $thumbImg = $thumbPath . $image_url;
              if (file_exists($thumbImg)) {
                  unlink($thumbImg);
              }
              $originalImg = $destinationPath . $image_url;
              if (file_exists($originalImg)) {
                  unlink($originalImg);
              }
          }
          $dataProfile->profile_pic  = $fileName;
      }
			$dataProfile->mothername = $mothername;
			$dataProfile->siblings = $siblings;
			$dataProfile->gender = $gender;
			$dataProfile->marital = $marital;
			$dataProfile->kids = $kids;
			$dataProfile->doj = $doj;
			$dataProfile->joiningage = $joiningage;
			$dataProfile->expreince = $expreince;
			$dataProfile->paddress = $paddress;
			$dataProfile->ppin = $ppin;
			$dataProfile->currentaddress = $currentaddress;
			$dataProfile->currentpin = $currentpin;
			$dataProfile->mobile = $mobile;
			$dataProfile->altmobile = $altmobile;
			$dataProfile->collagename = $collagename;
			$dataProfile->caddress = $caddress;
			$dataProfile->cpin = $cpin;
			$dataProfile->referencesdata = @$referencesdata;
			$dataProfile->referencename = $referencename;
			$dataProfile->relationship = $relationship;
			$dataProfile->contactname = $contactname;
			$dataProfile->contactaddress = $contactaddress;
			$dataProfile->contactpin = $contactpin;
			$dataProfile->jobarea = $jobarea;
			$dataProfile->userrole = $userrole;
			$dataProfile->empid = $empid;
			$dataProfile->user_department  = $user_department;
			$dataProfile->user_specialization = $user_specialization;
			$dataProfile->user_band  = $user_band;
			$dataProfile->user_designation  = $user_designation;
			$dataProfile->user_assest  = $user_assest;
			$dataProfile->user_exposure  = $user_exposure;
			$dataProfile->user_zone = $user_zone;
			$dataProfile->user_cluster  = $user_cluster;
			$dataProfile->cugmobile = $cugmobile;
			$dataProfile->letter = $letter;
			$dataProfile->personalaccount = $personalaccount;
			$dataProfile->personaltype = $personaltype;
			$dataProfile->ifsc = $ifsc;
			$dataProfile->salaryaccount = $salaryaccount;
			$dataProfile->pancard = $pancard;
			$dataProfile->aadhar = $aadhar;
			$dataProfile->passport = $passport;
			$dataProfile->salaryamount = $salaryamount;
			$dataProfile->tds = $tds;
			$dataProfile->advance = $advance;
			$dataProfile->deductions = $deductions;
			$dataProfile->reimbursements = $reimbursements;
			$dataProfile->incentives = $incentives;
			$dataProfile->totalsalary = $totalsalary;
			$dataProfile->gst = $gst;
			$dataProfile->save();	
			
			
			 /*----Save attachment----*/			
	 		$dataProfileA = new UserAttachment;
			$dataProfileA->user_id = $userId;
			
			
			 if (!empty($request->addressproof)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('addressproof')->getClientOriginalExtension();
						  $full_file_name = ($request->file('addressproof')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('addressproof');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->addressproof;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->address_proof   = $fileName;
             }
			//$dataProfileA->address_proof  = $request->addressproof;
			if (!empty($request->photoid)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('photoid')->getClientOriginalExtension();
						  $full_file_name = ($request->file('photoid')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('photoid');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->photoid;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->id_proof   = $fileName;
             }
			 if (!empty($request->graduate)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('graduate')->getClientOriginalExtension();
						  $full_file_name = ($request->file('graduate')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('graduate');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->graduate;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->degree = $fileName;
             }
			 if (!empty($request->employment)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('employment')->getClientOriginalExtension();
						  $full_file_name = ($request->file('employment')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('employment');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->employment;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->employment_proof   = $fileName;
             }
			 if (!empty($request->attachgst)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('attachgst')->getClientOriginalExtension();
						  $full_file_name = ($request->file('attachgst')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('attachgst');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->attachgst;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->gst_certificate   = $fileName;
             }
			 if (!empty($request->letterimage)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('letterimage')->getClientOriginalExtension();
						  $full_file_name = ($request->file('letterimage')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('letterimage');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->letterimage;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->acceptance_letter   = $fileName;
             }
			 if (!empty($request->attachpan)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('attachpan')->getClientOriginalExtension();
						  $full_file_name = ($request->file('attachpan')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('attachpan');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->attachpan;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->pan_card   = $fileName;
             }
					
            $dataProfileA->save();
			
			
	 				
		    Session::flash('alert-success', 'User Details successfully completed!');
		    return redirect('user/list');
            }
    }
	 public function saveEditDetails(Request $request)
    {
		//echo '<pre>';print_r($request->all());exit;
		
			/*------------------------INPUT START------------------------------*/
			$fathername = $request->fathername;	
			$mothername = $request->mothername;	
			$siblings = $request->siblings;	
			$gender = $request->gender;	
			$marital = $request->marital;	
			$kids = $request->kids;	
			$doj = $request->doj;	
			$joiningage = $request->joiningage;	
			$expreince = $request->expreince;	
			$paddress = $request->paddress;	
			$ppin = $request->ppin;	
			$currentaddress = $request->currentaddress;	
			$currentpin = $request->currentpin;	
			$mobile = $request->mobile;	
			$altmobile = $request->altmobile;	
			$collagename = $request->collagename;	
			$caddress = $request->caddress;	
			$cpin = $request->cpin;
			$referencesdata = $request->references;	
			$referencename = $request->referencename;	
			$relationship = $request->relationship;	
			$contactname = $request->contactname;	
			$contactaddress = $request->contactaddress;	
			$contactpin = $request->contactpin;	
			$jobarea = $request->jobarea;	
			$userrole = $request->userrole;	
			$empid = $request->empid;	
			$user_department = $request->user_department;	
			$user_specialization = $request->user_specialization;	
			$user_band = $request->user_band;	
			$user_designation = $request->user_designation;	
			$user_assest = $request->user_assest;	
			$user_exposure = $request->user_exposure;				
			$user_zone = $request->user_zone;				
			$user_cluster = $request->user_cluster;				
			$cugmobile = $request->cugmobile;				
			$letter = $request->letter;				
			$personalaccount = $request->personalaccount;							
			$personaltype = $request->personaltype;				
			$ifsc = $request->ifsc;				
			$salaryaccount = $request->salaryaccount;				
			$pancard = $request->pancard;				
			$aadhar = $request->aadhar;				
			$passport = $request->passport;				
			$salaryamount = $request->salaryamount;				
			$tds = $request->tds;				
			$advance = $request->advance;				
			$deductions = $request->deductions;				
			$reimbursements = $request->reimbursements;				
			$incentives = $request->incentives;				
			$totalsalary = $request->totalsalary;				
			$gst = $request->gst;				
			$userId = $request->userId;	
            /*------------------------INPUT END------------------------------*/			
			
			
			$dataProfile =UserProfile::where('user_id', '=',$userId)->first();
			$dataProfile->user_id = $userId;
			$dataProfile->fathername = $fathername;
			$dataProfile->mothername = $mothername;
			$dataProfile->siblings = $siblings;
			$dataProfile->gender = $gender;
			$dataProfile->marital = $marital;
			$dataProfile->kids = $kids;
			$dataProfile->doj = $doj;
			$dataProfile->joiningage = $joiningage;
			$dataProfile->expreince = $expreince;
			$dataProfile->paddress = $paddress;
			$dataProfile->ppin = $ppin;
			$dataProfile->currentaddress = $currentaddress;
			$dataProfile->currentpin = $currentpin;
			$dataProfile->mobile = $mobile;
			$dataProfile->altmobile = $altmobile;
			$dataProfile->collagename = $collagename;
			$dataProfile->caddress = $caddress;
			$dataProfile->cpin = $cpin;
			$dataProfile->referencesdata = @$referencesdata;
			$dataProfile->referencename = $referencename;
			$dataProfile->relationship = $relationship;
			$dataProfile->contactname = $contactname;
			$dataProfile->contactaddress = $contactaddress;
			$dataProfile->contactpin = $contactpin;
			$dataProfile->jobarea = $jobarea;
			$dataProfile->userrole = $userrole;
			$dataProfile->empid = $empid;
			$dataProfile->user_department  = $user_department;
			$dataProfile->user_specialization = $user_specialization;
			$dataProfile->user_band  = $user_band;
			$dataProfile->user_designation  = $user_designation;
			$dataProfile->user_assest  = $user_assest;
			$dataProfile->user_exposure  = $user_exposure;
			$dataProfile->user_zone = $user_zone;
			$dataProfile->user_cluster  = $user_cluster;
			$dataProfile->cugmobile = $cugmobile;
			$dataProfile->letter = $letter;
			$dataProfile->personalaccount = $personalaccount;
			$dataProfile->personaltype = $personaltype;
			$dataProfile->ifsc = $ifsc;
			$dataProfile->salaryaccount = $salaryaccount;
			$dataProfile->pancard = $pancard;
			$dataProfile->aadhar = $aadhar;
			$dataProfile->passport = $passport;
			$dataProfile->salaryamount = $salaryamount;
			$dataProfile->tds = $tds;
			$dataProfile->advance = $advance;
			$dataProfile->deductions = $deductions;
			$dataProfile->reimbursements = $reimbursements;
			$dataProfile->incentives = $incentives;
			$dataProfile->totalsalary = $totalsalary;
			$dataProfile->gst = $gst;
			$dataProfile->save();	
	 				
		    Session::flash('alert-success', 'User Details successfully Updated!');
		    return redirect('user/list');
            
    }
	public function saveAssUserDetails(Request $request)
    {
		    //echo '<pre>';print_r($request->all());exit;
			  $validateData = array(         
			  'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
			);
			$this->validate($request, $validateData);       
			/*------------------------INPUT START------------------------------*/
			$userId=$request->userId;
			$fathername=$request->fathername;
			$mothername=$request->mothername;
			$gender=$request->gender;
			$marital=$request->marital;
			$doa=$request->doa;
			$doj=$request->doj; 
			$expreince=$request->expreince; 
			$paddress=$request->paddress;
			$currentaddress=$request->currentaddress; 
			$currentpin=$request->currentpin;  
			$mobile=$request->mobile;  
			$altmobile=$request->altmobile;
			$graduatecourse=$request->graduatecourse;
			$graduatecollagename=$request->graduatecollagename;
			$graduateyop=$request->graduateyop;
			$graduatemarks=$request->graduatemarks;
			$postcourse=$request->postcourse;
			$postcollagename=$request->postcollagename;
			$postyop=$request->postyop;
			$postmarks=$request->postmarks;
			$references=$request->references;
			$professional1name=$request->professional1name;
			$professional1relationship=$request->professional1relationship;
			$professional1mobile=$request->professional1mobile;
			$professional1knowing=$request->professional1knowing;
			$professional1contactname=$request->professional1contactname;
			$professional2name=$request->professional2name;
			$professional2relationship=$request->professional2relationship;
			$professional2mobile=$request->professional2mobile;
			$professional2knowing=$request->professional2knowing;
			$professional2contactname=$request->professional2contactname;
			$friendname=$request->friendname;
			$friendrelationship=$request->friendrelationship;
			$friendmobile=$request->friendmobile;
			$friendknowing=$request->friendknowing;
			$friendcontactname=$request->friendcontactname;
			$userrole=$request->userrole; 
			$working_status=$request->working_status;
			$user_department=$request->user_department;  
			$user_band=$request->user_band;  	 
			$user_zone=$request->user_zone;  
			$user_cluster=$request->user_cluster;  	 
			$letter=$request->letter;  
			$personalaccount=$request->personalaccount; 
			$personaltype=$request->personaltype;
			$ifsc=$request->ifsc;  
			$pancard=$request->pancard; 
			$aadhar=$request->aadhar;			
			
	
            /*------------------------INPUT END------------------------------*/			
			

            $duplication=UserProfile::where('user_id','=',$userId)->select('id')->first();

            if(!empty($duplication->id)){
			
             Session::flash('alert-danger', 'Associate User details already completed!');
		     return redirect('user/list');
			
             }else{
			
			$dataProfile = new UserProfile;
			$dataProfile->user_id = $userId;
			
			
			 if (!empty($request->profile_pic)) { // Check null image
          //Image uploader plugin save            
          $fileextenstion = $request->file('profile_pic')->getClientOriginalExtension();
          $full_file_name = ($request->file('profile_pic')->getClientOriginalName());
          $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

          //Thumb
          $photo = $request->file('profile_pic');
          $thumbPath = base_path() . '/public/images/profile';
          $thumb_img = Image::make($photo->getRealPath());
          // resize the image to a width of 200 and constraint aspect ratio (auto height)
          $thumb_img->resize(300, null, function ($constraint) {
              $constraint->aspectRatio();
          });
          //$dataProfile->save($thumbPath . '/' . $fileName, 80);
          //Original Image
          $destinationPath = base_path() . '/public/images/profile';
          $photo->move($destinationPath, $fileName);

          $image_url = $request->profile_pic;
          if (!empty($image_url)) {
              $thumbImg = $thumbPath . $image_url;
              if (file_exists($thumbImg)) {
                  unlink($thumbImg);
              }
              $originalImg = $destinationPath . $image_url;
              if (file_exists($originalImg)) {
                  unlink($originalImg);
              }
          }
          $dataProfile->profile_pic  = $fileName;
      }

			
			$dataProfile->fathername=$request->fathername;
			$dataProfile->mothername=$request->mothername;
			$dataProfile->gender=$request->gender;
			$dataProfile->marital=$request->marital;
			$dataProfile->doa=$request->doa;
			$dataProfile->doj=$request->doj;   
			$dataProfile->expreince=$request->expreince ; 
			$dataProfile->paddress=$request->paddress; 
			$dataProfile->currentaddress=$request->currentaddress ; 
			$dataProfile->currentpin=$request->currentpin;  
			$dataProfile->mobile=$request->mobile;  
			$dataProfile->altmobile=$request->altmobile;
			$dataProfile->graduatecourse=$request->graduatecourse;
			$dataProfile->graduatecollagename=$request->graduatecollagename;
			$dataProfile->graduateyop=$request->graduateyop;
			$dataProfile->graduatemarks=$request->graduatemarks;
			$dataProfile->postcourse=$request->postcourse;
			$dataProfile->postcollagename=$request->postcollagename;
			$dataProfile->postyop=$request->postyop;
			$dataProfile->postmarks=$request->postmarks;
			$dataProfile->referencesdata =$request->references;
			$dataProfile->professional1name=$request->professional1name;
			$dataProfile->professional1relationship=$request->professional1relationship;
			$dataProfile->professional1mobile=$request->professional1mobile;
			$dataProfile->professional1knowing=$request->professional1knowing;
			$dataProfile->professional1contactname=$request->professional1contactname;
			$dataProfile->professional2name=$request->professional2name;
			$dataProfile->professional2relationship=$request->professional2relationship;
			$dataProfile->professional2mobile=$request->professional2mobile;
			$dataProfile->professional2knowing=$request->professional2knowing;
			$dataProfile->professional2contactname=$request->professional2contactname;
			$dataProfile->friendname=$request->friendname;
			$dataProfile->friendrelationship=$request->friendrelationship;
			$dataProfile->friendmobile=$request->friendmobile;
			$dataProfile->friendknowing=$request->friendknowing;
			$dataProfile->friendcontactname=$request->friendcontactname;
			$dataProfile->userrole=$request->userrole; 
			$dataProfile->working_status=$request->working_status;
			$dataProfile->user_department=$request->user_department;  
			$dataProfile->user_band=$request->user_band ; 	 
			$dataProfile->user_zone=$request->user_zone;  
			$dataProfile->user_cluster=$request->user_cluster;  	 
			$dataProfile->letter=$request->letter;  
			$dataProfile->personalaccount=$request->personalaccount; 
			$dataProfile->personaltype=$request->personaltype; 
			$dataProfile->ifsc=$request->ifsc;  
			$dataProfile->pancard=$request->pancard;  
			$dataProfile->aadhar=$request->aadhar; 
			$dataProfile->save();

            /*----Save attachment----*/			
	 		$dataProfileA = new UserAttachment;
			$dataProfileA->user_id = $userId;
			
			
			 if (!empty($request->addressproof)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('addressproof')->getClientOriginalExtension();
						  $full_file_name = ($request->file('addressproof')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('addressproof');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->addressproof;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->address_proof   = $fileName;
             }
			//$dataProfileA->address_proof  = $request->addressproof;
			if (!empty($request->photoid)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('photoid')->getClientOriginalExtension();
						  $full_file_name = ($request->file('photoid')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('photoid');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->photoid;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->id_proof   = $fileName;
             }
			 if (!empty($request->graduate)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('graduate')->getClientOriginalExtension();
						  $full_file_name = ($request->file('graduate')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('graduate');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->graduate;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->degree = $fileName;
             }
			 if (!empty($request->employment)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('employment')->getClientOriginalExtension();
						  $full_file_name = ($request->file('employment')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('employment');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->employment;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->employment_proof   = $fileName;
             }
			 if (!empty($request->attachgst)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('attachgst')->getClientOriginalExtension();
						  $full_file_name = ($request->file('attachgst')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('attachgst');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->attachgst;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->gst_certificate   = $fileName;
             }
			 if (!empty($request->letterimage)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('letterimage')->getClientOriginalExtension();
						  $full_file_name = ($request->file('letterimage')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('letterimage');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->letterimage;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->acceptance_letter   = $fileName;
             }
			 if (!empty($request->attachpan)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('attachpan')->getClientOriginalExtension();
						  $full_file_name = ($request->file('attachpan')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('attachpan');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->attachpan;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->pan_card   = $fileName;
             }
			 if (!empty($request->itr)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('itr')->getClientOriginalExtension();
						  $full_file_name = ($request->file('itr')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('itr');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->itr;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->itr   = $fileName;
             }
			 if (!empty($request->bill)) { // Check null image
						  //Image uploader plugin save            
						  $fileextenstion = $request->file('bill')->getClientOriginalExtension();
						  $full_file_name = ($request->file('bill')->getClientOriginalName());
						  $fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;

						  //Thumb
						  $photo = $request->file('bill');
						  $thumbPath = base_path() . '/public/images/certificates';
						  $thumb_img = Image::make($photo->getRealPath());
						  // resize the image to a width of 200 and constraint aspect ratio (auto height)
						  $thumb_img->resize(300, null, function ($constraint) {
							  $constraint->aspectRatio();
						  });
						  //$dataProfile->save($thumbPath . '/' . $fileName, 80);
						  //Original Image
						  $destinationPath = base_path() . '/public/images/certificates';
						  $photo->move($destinationPath, $fileName);

						  $image_url = $request->bill;
						  if (!empty($image_url)) {
							  $thumbImg = $thumbPath . $image_url;
							  if (file_exists($thumbImg)) {
								  unlink($thumbImg);
							  }
							  $originalImg = $destinationPath . $image_url;
							  if (file_exists($originalImg)) {
								  unlink($originalImg);
							  }
						  }
						  $dataProfileA->utility_bill   = $fileName;
             }
			//$dataProfileA->id_proof  =$request->photoid;
			//$dataProfileA->degree =$request->graduate;
			//$dataProfileA->employment_proof 	 = $request->employment;
			//$dataProfileA->gst_certificate  = $request->attachgst;
			//$dataProfileA->acceptance_letter = $request->letterimage;
			//$dataProfileA->pan_card  = $request->attachpan;
			//$dataProfileA->itr  =$request->itr;
			//$dataProfileA->utility_bill = $request->bill;			
            $dataProfileA->save();
			
		    Session::flash('alert-success', 'Associate User Details successfully completed!');
		    return redirect('user/list');
            }
    }
     public function saveEditAssUserdetail(Request $request)
    {
		     //echo '<pre>';print_r($request->all());
			// exit;		
			 
			/*------------------------INPUT START------------------------------*/
			$userId=$request->userId;
            /*------------------------INPUT END------------------------------*/			
			
			$dataProfile =UserProfile::where('user_id', '=',$userId)->first();
			$dataProfile->user_id = $userId;
			$dataProfile->fathername=$request->fathername;
			$dataProfile->mothername=$request->mothername;
			$dataProfile->gender=$request->gender;
			$dataProfile->marital=$request->marital;
			$dataProfile->doa=$request->doa;
			$dataProfile->doj=$request->doj;   
			$dataProfile->expreince=$request->expreince ; 
			$dataProfile->paddress=$request->paddress; 
			$dataProfile->currentaddress=$request->currentaddress ; 
			$dataProfile->currentpin=$request->currentpin;  
			$dataProfile->mobile=$request->mobile;  
			$dataProfile->altmobile=$request->altmobile;
			$dataProfile->graduatecourse=$request->graduatecourse;
			$dataProfile->graduatecollagename=$request->graduatecollagename;
			$dataProfile->graduateyop=$request->graduateyop;
			$dataProfile->graduatemarks=$request->graduatemarks;
			$dataProfile->postcourse=$request->postcourse;
			$dataProfile->postcollagename=$request->postcollagename;
			$dataProfile->postyop=$request->postyop;
			$dataProfile->postmarks=$request->postmarks;
			$dataProfile-> referencesdata =$request->references;
			$dataProfile->professional1name=$request->professional1name;
			$dataProfile->professional1relationship=$request->professional1relationship;
			$dataProfile->professional1mobile=$request->professional1mobile;
			$dataProfile->professional1knowing=$request->professional1knowing;
			$dataProfile->professional1contactname=$request->professional1contactname;
			$dataProfile->professional2name=$request->professional2name;
			$dataProfile->professional2relationship=$request->professional2relationship;
			$dataProfile->professional2mobile=$request->professional2mobile;
			$dataProfile->professional2knowing=$request->professional2knowing;
			$dataProfile->professional2contactname=$request->professional2contactname;
			$dataProfile->friendname=$request->friendname;
			$dataProfile->friendrelationship=$request->friendrelationship;
			$dataProfile->friendmobile=$request->friendmobile;
			$dataProfile->friendknowing=$request->friendknowing;
			$dataProfile->friendcontactname=$request->friendcontactname;
			$dataProfile->userrole=$request->userrole; 
			$dataProfile->working_status=$request->working_status;
			$dataProfile->user_department=$request->user_department;  
			$dataProfile->user_band=$request->user_band ; 	 
			$dataProfile->user_zone=$request->user_zone;  
			$dataProfile->user_cluster=$request->user_cluster;  	 
			$dataProfile->letter=$request->letter;  
			$dataProfile->personalaccount=$request->personalaccount; 
			$dataProfile->personaltype=$request->personaltype; 
			$dataProfile->ifsc=$request->ifsc;  
			$dataProfile->pancard=$request->pancard;  
			$dataProfile->aadhar=$request->aadhar; 
			$dataProfile->save();	
	 				
		    Session::flash('alert-success', 'Associate User Details successfully Updated!');
		    return redirect('user/list');
            
    }
    public function editDetails($id)
    { 
     
	 $userData= UserProfile::with('userDetails')->where('user_id','=',$id)->first();	 
	 //echo "<pre>";print_r($userData);exit;
	 
	 $userType= UserType::pluck('name','id');
     $userDepartment= Department::pluck('name','id');
     $userSpecialization= Specialization::pluck('name','id');
     $userDesignation= Designations::pluck('name','id');
     $userBrand= BandLevel::pluck('name','id');
     $industrialExposure= IndustrialExposureLevel::pluck('employee_level','id');
     $zoneAssigned= Zone::pluck('name','id');
     $clusterAssigned= Cluster::pluck('name','id');
     return view('admin.user.edit_user_details')
				->with('page_title',$this->page_title)
				->with('breadcrumb',$this->breadcrumb)
				->with('userDepartment',$userDepartment)
				->with('userSpecialization',$userSpecialization)
				->with('userDesignation',$userDesignation)
				->with('userBrand',$userBrand)
				->with('industrialExposure',$industrialExposure)
				->with('zoneAssigned',$zoneAssigned)
				->with('clusterAssigned',$clusterAssigned)
				->with('userType',$userType)
				->with('userData',$userData);
    }
	public function editAssUserdetail($id)
    { 
     
	 $userData= UserProfile::with('userDetails')->where('user_id','=',$id)->first();	 
     //echo '<pre>';print_r($userData);exit;	
	 $userType= UserType::pluck('name','id');
     $userDepartment= Department::pluck('name','id');
     $userSpecialization= Specialization::pluck('name','id');
     $userDesignation= Designations::pluck('name','id');
     $userBrand= BandLevel::pluck('name','id');
     $industrialExposure= IndustrialExposureLevel::pluck('employee_level','id');
     $zoneAssigned= Zone::pluck('name','id');
     $clusterAssigned= Cluster::pluck('name','id');
     return view('admin.user.edit_asso_details')
				->with('page_title',$this->page_title)
				->with('breadcrumb',$this->breadcrumb)
				->with('userDepartment',$userDepartment)
				->with('userSpecialization',$userSpecialization)
				->with('userDesignation',$userDesignation)
				->with('userBrand',$userBrand)
				->with('industrialExposure',$industrialExposure)
				->with('zoneAssigned',$zoneAssigned)
				->with('clusterAssigned',$clusterAssigned)
				->with('userType',$userType)
				->with('userData',$userData);
    }
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userStore(Request $request)
    {
		$this->validate($request, [
			   'email' => 'required',
			   'name' => 'required'
			   
			]);
			
			//echo'<pre>';print_r($request->all());exit;
			$originalDate = $request->dob;
            $newDate = date("Y-m-d", strtotime($request->dob));
		
            $name = $request->name;			
			$dob = $newDate;
			$email = $request->email;
			$status = $request->status;
			$std = $request->std;
			$user_type = $request->user_type;
			$parentusertype = $request->parentusertype;
			$subusertype = $request->subusertype;

            $duplication=UserDetail::where('user_official_email','=',$email)->select('user_official_email')->first();

            if(!empty($duplication->user_official_email)){
			
             Session::flash('alert-danger', 'Email already registered!');
		     return redirect('user/list');
			
             }else{
			$password =  mt_rand(10000, 99999);
			$data = new User;
			$data->name = $name;
			$data->email = $email;		
			$data->password = $password;
			$data->user_type_id = $user_type;
			$data->status = $status;
			$data->save();			
			
			$userId = $data->id;			
			$dataDetail = new UserDetail;
			$dataDetail->user_id = $userId;
            $dataDetail->bank_id = 0;			
			$dataDetail->user_official_email = $email;
			$dataDetail->main_user_type = $parentusertype;
			$dataDetail->sub_user_type  = @$subusertype;
            $dataDetail->date = $dob;	
            $dataDetail->phone = $std;			
			$dataDetail->save();	
	 				
		    Session::flash('alert-success', 'Account successfully registered!');
		    return redirect('list');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
     

    public function editUser($id)
    {      
	 $userData= User::with('userDetails')->where('id','=',$id)->first();
	 $userType= UserType::pluck('name','id');
     return view('admin.user.edit_user')
				->with('page_title',$this->page_title)
				->with('breadcrumb',$this->breadcrumb)
				->with('listing',$this->listing)
				->with('userType',$userType)
				->with('userData',$userData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updateUserDetails(Request $request)
    {
		//echo $request->userId;
		$originalDate = $request->dob;
        $newDate = date("Y-m-d", strtotime($originalDate));
		$this->validate($request, [
			   'email' => 'required',
			   'name' => 'required'
			   
			]);
			
            $name = $request->name;			
			$dob = $newDate;
			$email = $request->email;
			$status = $request->status;
			$std = $request->std;
			$user_type = $request->user_type;

			$data = User::find($request->userId);
			$data->name = $name;
			$data->email = $email;		
			$data->user_type_id = $user_type;
			$data->status = $status;
			$data->save();
			
			$dataDetail = UserDetail::where('user_id','=',$request->userId)->first();
			$dataDetail->user_id = $request->userId;
            $dataDetail->bank_id = 0;			
			$dataDetail->user_official_email = $email;
            $dataDetail->date = $dob;	
            $dataDetail->phone = $std;			
			$dataDetail->save();	
	 				
		    Session::flash('alert-success', 'Account Updated successfully!');
		    return redirect('list');
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		 $user = User::find($id);		 
		 if($user->delete()){
	     $deletedUserDetailData= UserDetail::where('user_id', '=', $id)->first();
		 $deletedUserDetailData->delete();
		 }
		 Session::flash('alert-success', 'User Deleted successfully!');
		 return redirect('user/list');
    }
	public function userDelete($id)
    {
		 $user = User::find($id);		 
		 if($user->delete()){
	     $deletedUserDetailData= UserDetail::where('user_id', '=', $id)->first();
		 $deletedUserDetailData->delete();
		 }
		 Session::flash('alert-success', 'User Deleted successfully!');
		 return redirect('getuserlist');
    }
	public function action($id)
    {
				
		 $user = User::where('id', '=', $id)->select('status')->first();
		 //echo $id;print_r($user);exit;
         if($user->status == 1){
		 $user = User::find($id);	 
		 $user->status=2;
		 $user->save();
		 Session::flash('alert-success', 'User Disabled successfully!');
		 return redirect('list');
		 
		}else{
		 $user = User::find($id);		 
		 $user->status=1;
		 $user->save();	
		 Session::flash('alert-success', 'User Enabled successfully!');
		 return redirect('list');
		}
		 
    }
	public function userAction($id)
    {
				
		 $user = User::where('id', '=', $id)->first();		 
         if($user->status == 1){
		 $user = User::find($id);	 
		 $user->status=2;
		 $user->save();
		 Session::flash('alert-success', 'User Disabled successfully!');
		 return redirect('getuserlist');
		 
		}else{
		 $user = User::find($id);		 
		 $user->status=1;
		 $user->save();	
		 Session::flash('alert-success', 'User Enabled successfully!');
		 return redirect('getuserlist');
		}
		 
    }

    public function login(){
        return view('user.login');
    }
	
	public function getuserlist(){
		$getUserDetails = User::select('*')->with('userDetails','getBanksUserId')->where('status',1)->get();
		$this->p($getUserDetails);		
		die();
	}

    public function signupUserDelete($id)
    {
        $user = User::find($id);
        if($user->delete()){
            $deletedUserDetailData= UserDetail::where('user_id', '=', $id)->first();
            $deletedUserDetailData->delete();
        }
        Session::flash('alert-success', 'User Deleted successfully!');
        return redirect('registered');
    }

    public function indexRegistered()
    {
        $userdetails = User::join('user_details', 'user_details.user_id', '=', 'users.id')
            ->paginate($this->rowPerPage);
            return view('admin.user.registered_list_user')
					->with('page_title',$this->page_title)
					->with('breadcrumb',$this->breadcrumb)
					->with('listing',$this->listing)
					->with('userdetail',$userdetails );
    }
    public function signupAction($id)
    {

        $user = User::where('id', '=', $id)->select('status')->first();
        if($user->status == 1){
            $user = User::find($id);
            $user->status=2;
            $user->save();
            Session::flash('alert-success', 'User Disabled successfully!');
            return redirect('registered');

        }else{
            $user = User::find($id);
            $user->status=1;
            $user->save();
            Session::flash('alert-success', 'User Enabled successfully!');
            return redirect('registered');
        }

    }
	/*-------------Sandeep Frontend Methods Start--------------------*/
	 public function dashboard()
    {
        return view('evaluation.administrator.dashboard');   
    }
	public function emailRequest(Request $request)	
    {  
        $result=User::where('email', '=' ,$request['email'])->first();
		if(count($result)){
			$otp =  mt_rand(100000, 999999);
			$hasEncrypt = Hash::make($otp);
			User::where('email', '=' ,$request['email'])->update(['password' => $hasEncrypt]);
			/* Email Start */
            $loginUrl = '<a href="' . url('/') . '/login">Click here to Login</a>';
            $email_data = array();
            $email_data['to'] = $request['email'];
            $email_data['name'] = $result->name;
            $email_data['password'] = $otp;
			// send email
			$to = $request['email'];
            $subject = "Evaluation Customer Otp";
			$message = "
							<html>
							<head>
							<title>Evaluation email</title>
							</head>
							<body>
							<p>This email related to one time password!</p>
							<table>
							<tr>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Your Email ID:</th>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>OTP:</th>
							</tr>
							<tr>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$request['email']."</td>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$otp."</td>
							</tr>
							</table>
							</body>
							</html>";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <sandeepv803@gmail>' . "\r\n";
				mail($to,$subject,$message,$headers);        
        /* Mail End */
		Session::flash('alert-success', 'Mail successfully match!');
		return  view('auth.otp_login');
		}else{
			Session::flash('alert-danger', 'Email not registered!');
			return redirect('login');
        
		}     
    }
	public function otpLogin()
	
    {  
	   return view('auth.otp_login');
    }
	
	public function bankTransfer()	
    { 
       $bankDetail = BankDetail::select('ifsc_code', 'id')->get();	
	   return view('evaluation.bank.bank_transfer', compact('bankDetail'));
    }		
	public function bankTransferOtp()	
    {  
	   return view('evaluation.bank.bank_transfer_otp');
    }
	
	public function updateBankOtp(Request $request)	
    { 
	$otpData= $request->otp;
	$data=User::where('password', '=' ,$otpData)->first();
	if(!empty($data)){
		
	UserDetail::where('user_id','=', $data->id)->update(['user_official_email' => $request->newOfficial]);	
		
	Session::flash('alert-success', 'Bank detail successfully Transfered!');
	return redirect('transfer_bank');  	
	}
	Session::flash('alert-danger', 'OTP not match!');
	return redirect('transfer_bank_otp');   
    }
	
	
	
	public function updateNewBank(Request $request)	
    {     
	$otpDataEmail= $request->oemail;
	$otpData= $request->hidden_otp;
	
	$data=User::where('password', '=' ,$otpData)->first();
	if(count($data)){
    $updateEmail=User::where('password', '=' ,$otpData)->update(['email' => $otpDataEmail]);
	Session::flash('alert-success', 'Bank Email successfully Updated!');
	return view('evaluation.bank.bank_transfer');	
	}
    Session::flash('alert-success', 'Bank Email not Updated!');	
	return redirect('transfer_bank_otp');   
    }
	public function updateBank(Request $request)	
    {  		
		if($request->other_user_email){
			$userEmailData= $request->other_user_email;
		}
		if($request->user_email){
			$userEmailData= $request->user_email;
		}	
		if($request->new_off_email){
			$newOfficial= $request->new_off_email;
		}
		if($request->user_email){
			$newOfficial= $request->user_email;
		}
		$bankifscData= $request->ifsc;
		
        $findData=User::where('email','=', $userEmailData)->first();
		
	if(!empty($findData)){
		$userResult=UserDetail::where('user_id', '=' ,$findData->id)->first();
		if(count($userResult)){			
			$otp =  mt_rand(100000, 999999);			
			$updateOtp=User::where('id', '=' ,$findData->id)->update(['password' => $otp]);
			$userID= $userResult->id;
			/* Email Start */			
			$to = $userResult->user_official_email;
            $subject = "Evaluation Bank Transfer OTP";
			$message = "
							<html>
							<head>
							<title>Evaluation email</title>
							</head>
							<body>
							<p>This email related to one time password!</p>
							<table>
							<tr>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Your Email ID:</th>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>OTP:</th>
							</tr>
							<tr>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$userResult->user_official_email."</td>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$otp."</td>
							</tr>
							</table>
							</body>
							</html>";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <sandeepv803@gmail>' . "\r\n";
				mail($to,$subject,$message,$headers);        
			/* Mail End */
			 Session::flash('alert-success', 'OTP successfully sent!');
			 return view('evaluation.bank.bank_transfer_otp',compact ('userID','bankEmailData','bankifscData','newOfficial'));
		}else{
			Session::flash('alert-danger', 'OTP not successfully sent!');
			return redirect('transfer_bank');
		}
    }else{
			Session::flash('alert-danger', 'User email not exist!');
			return redirect('transfer_bank');  
		    }
}
	
	public function sendEmail(Request $request)	
    {  
	   $result=User::where('email', '=' ,$request->mail)->first();
		if(count($result)){
			$otp =  mt_rand(10000, 99999);
			User::where('id', '=' ,$result->id)->update(['password' => $otp]);
			$creditBankEmail=UserDetail::where('user_id', '=' ,$result->id)->select('user_official_email')->first();
			/* Email Start */
            $loginUrl = '<a href="' . url('/') . '/login">Click here to Login</a>';
			// send email
			$to = $creditBankEmail->user_official_email;
            $subject = "Evaluation Customer Otp";
			$message = "
							<html>
							<head>
							<title>Evaluation email</title>
							</head>
							<body>
							<p>This email related to one time password!</p>
							<table>
							<tr>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Your Email ID:</th>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>OTP:</th>
							</tr>
							<tr>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$creditBankEmail->user_official_email."</td>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$otp."</td>
							</tr>
							</table>
							</body>
							</html>";

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <sandeepv803@gmail>' . "\r\n";
				mail($to,$subject,$message,$headers);        
        /* Mail End */
		echo 'true';
		exit;
		}else{
		echo 'false';
		exit;        
		}	   
    }
	public function ajaxBankDetail(Request $request)	
    {  
	    $data=BankDetail::where('id', '=', $request->id)->first();
	    echo ' <div class="row">
				<div class="input-field col s6">
				<label for="first_name">Bank Name</label>
				<input id="name" type="text" value="'.$data->bank_name .'"  disabled style="background-color: #f2f2f2;">
				</div>
				<div class="input-field col s6">
				<label for="name">Branch Name</label>
				<input id="name" type="text" value="'.$data->branch_name  .'"  disabled style="background-color: #f2f2f2;">				  							  
				</div></div><div class="row">
				<div class="input-field col s6">
				<label for="first_name">Branch Email</label>
				<input id="name" type="text" value="'.$data->branch_official_email_id  .'"  disabled style="background-color: #f2f2f2;">
				</div>
				<div class="input-field col s6">
				<label for="name">Branch Address</label>
				<input id="name" type="text" value="'.$data->branch_address   .'"  disabled style="background-color: #f2f2f2;">				  							  
				</div></div><div class="row">
				<div class="input-field col s6">
				<label for="first_name">State</label>
				<input id="name" type="text" value="'.Common::getBankState($data->pincode_state_city_mapping_id ).'"  disabled style="background-color: #f2f2f2;">
				</div>
				<div class="input-field col s6">
				<label for="name">City</label>
				<input id="name" type="text" value="'.Common::getBankCity($data->pincode_state_city_mapping_id ).'"  disabled style="background-color: #f2f2f2;">				  							  
				</div></div><div class="row">
				<div class="input-field col s6">
				<label for="first_name">Phone</label>
				<input id="name" type="text" value="'.$data->branch_phone .'"  disabled style="background-color: #f2f2f2;">
				</div>
				<div class="input-field col s6">
				<label for="name">Pincode</label>
				<input id="name" type="text" value="'.Common::getBankDetailByPin($data->pincode_state_city_mapping_id ).'"  disabled style="background-color: #f2f2f2;">				  							  
				</div></div>';
				exit;
    }
	public function ajaxBankTransferDetail(Request $request)	
    {  
		$data=UserDetail::with('user')->where('bank_id', '=', $request->id)->get();
				$html ='<br><label for="ifsc_emails">Credit Team Official Email</label><select class="validate" name="ifsc_emails" required><option value="">Please select</option>';
					foreach($data as $row){
                $html .= '<option value="'.$row->user->email.'">'.$row->user->email.'</option>';
					  }
				$html .= '</select>';				
				echo $html;
				exit;
				
    }
		public function loginBoard(Request $request)	
    {
		
		$password= $request->otp;
		$loginData = User::where('password', '=', $request->otp)->first();
		if(!empty($loginData)){
		$userRoleID= $loginData->user_type_id;//exit;
		if($userRoleID == 1){	
		return redirect('dashboard_bank');	//Bank user board
		}elseif($userRoleID == 2){	
		return redirect('dashboard_nbfc');//NBFC user board	
		}elseif($userRoleID == 3){
		return redirect('dashboard_corporate');//Corporate user board	
		}else{
		return redirect('dashboard_customer');	//Normal user board
		}
		}else{
			Session::flash('alert-danger', 'OTP not match!');
			return redirect('login');
		}
		
	}
	public function otpSend(Request $request)	
    {
		$password= ($request->password);
		$email= ($request->email);
		if(!empty($password) && !empty($email)){	     
	     $credentials = [
						 'email' => $email,	
						 'password' => $password,		
						 ];	
	    if (Auth::attempt($credentials)) {		   
        return redirect('dashboard_board');	   
	    }else{
		Session::flash('alert-danger', 'OTP not match!');	
		return view('auth.otp_login');	
		}
		}
	}
	
    public function signup(Request $request) {
			if($request->action == 'bank'){			
			$this->validate($request, [
			   'oemail' => 'required',
			   'uemail' => 'required|email|unique:users,email'
			]);
			$creditMailID = $request->oemail;
			$password =  mt_rand(10000, 99999);
			$data = new User;
			$data->name = trim($request->name);
			$data->email = trim($request->uemail);	
			$data->password = $password;
			$data->user_type_id = 1;
			$data->save();
			$userId = $data->id;
			
			$dataDetail = new UserDetail;
			$dataDetail->user_id = $userId;		
			$dataDetail->bank_id  = $request->ifsc;
			$dataDetail->user_official_email = trim($request->oemail);		
			$dataDetail->team_id  = $request->team;
			$dataDetail->department_id   = $request->Department;
			$dataDetail->designation_id   = $request->designation;		
			$dataDetail->save();
		 /* Email Start*/
            $loginUrl = url('verify/email/'.$userId);
			$to = $creditMailID;
			
            $subject = "Evaluation Customer Activation";
			$message = "
							<html>
							<head>
							<title>Evaluation email</title>
							</head>
							<body>
							<p>This email related to Activate Account!</p>
							<table>
							<tr>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Your Email ID:</th>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Click Here:</th>
							</tr>
							<tr>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$creditMailID."</td>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$loginUrl."</td>
							</tr>
							</table>
							</body>
							</html>
							";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <m8005029425@gmail.com>' . "\r\n";
				mail($to,$subject,$message,$headers);
				/* Email Start*/				
		Session::flash('alert-success', 'Bank Account successfully registered. Please check your mail and activate !!');
		return redirect('login');
		
		}elseif($request->action == 'nbfc'){
			
		$this->validate($request, [
           'oemail' => 'required',
		   'uemail' => 'required|email|unique:users,email'
        ]);
		$creditMailID = $request->oemail;
		$password =  mt_rand(10000, 99999);
        $data = new User;
        $data->name = trim($request->name);
		$data->email = trim($request->uemail);		
	    $data->password = $password;
		$data->user_type_id = 2;
		$data->save();
        $userId = $data->id;
		
		$dataDetail = new UserDetail;  
        $dataDetail->user_id = $userId;			
		$dataDetail->user_official_email = trim($request->oemail);	
		$dataDetail->team_id  = $request->team;
		$dataDetail->department_id   = $request->Department;
		$dataDetail->designation_id   = $request->designation;		
		$dataDetail->save();
		 /* Email Start*/
            $loginUrl = (url('/verify/email/'.$userId));
			$to = $creditMailID;
            $subject = "Evaluation Customer Activation";
			$message = "<html>
							<head>
							<title>Evaluation email</title>
							</head>
							<body>
							<p>This email related to Activate Account!</p>
							<table>
							<tr>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Your Email ID:</th>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Click Here:</th>
							</tr>
							<tr>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$creditMailID."</td>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$loginUrl."</td>
							</tr>
							</table>
							</body>
							</html>";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <sandeepv803@gmail>' . "\r\n";
				mail($to,$subject,$message,$headers);
				/* Email Start*/
				
		Session::flash('alert-success', 'NBFC Account successfully registered. Please check your mail and activate !!');
		return redirect('login');
		
		
		}elseif($request->action == 'corporate'){  //corporate
			
		$this->validate($request, [
           'oemail' => 'required',
		   'uemail' => 'required|email|unique:users,email'
        ]);
		$creditMailID = $request->oemail;
		$password =  mt_rand(10000, 99999);
        $data = new User;
        $data->name = trim($request->name);
		$data->email = trim($request->uemail);		
	    $data->password = $password;
		$data->user_type_id = 3;
		$data->save();
        $userId = $data->id;
		
		$dataDetail = new UserDetail;  
        $dataDetail->user_id = $userId;			
		$dataDetail->user_official_email = trim($request->oemail);		
		$dataDetail->team_id  = $request->team;
		$dataDetail->department_id   = $request->Department;
		$dataDetail->designation_id   = $request->designation;		
		$dataDetail->save();
		 /* Email Start*/
            $loginUrl = (url('/verify/email/'.$userId));
            $email_data = array();
            $email_data['to'] = $creditMailID;
            $email_data['name'] = $request->name;
			$email_data['url'] = $loginUrl;			
			
			$to = $creditMailID;
            $subject = "Evaluation Customer Activation";
			$message = "
							<html>
							<head>
							<title>Evaluation email</title>
							</head>
							<body>
							<p>This email related to Activate Account!</p>
							<table>
							<tr>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Your Email ID:</th>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Click Here:</th>
							</tr>
							<tr>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$creditMailID."</td>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$loginUrl."</td>
							</tr>
							</table>
							</body>
							</html>
							";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <sandeepv803@gmail>' . "\r\n";
				mail($to,$subject,$message,$headers);
				/* Email Start*/
				
		Session::flash('alert-success', 'Corporate Account successfully registered. Please check your mail and activate !!');
		return redirect('login');
		
		}else{
		$this->validate($request, [
           'email' => 'required|email|unique:users,email',
        ]);
			
		$creditMailID = $request->email;
		$password =  mt_rand(10000, 99999);
        $data = new User;
        $data->name = trim($request->name);
		$data->email = trim($request->email);		
	    $data->password = $password;
		$data->user_type_id = 4;
		$data->save();
        $userId = $data->id;
		
		$dataDetail = new UserDetail;  
        $dataDetail->user_id = $userId;	
        $dataDetail->user_official_email = trim($request->email);		
		$dataDetail->phone = trim($request->phone);		
		$dataDetail->date  = $request->date;
		$dataDetail->pincode   = $request->pin;		
		$dataDetail->save();
		 /* Email Start*/
            $loginUrl = (url('/verify/email/'.$userId));
            $email_data = array();
            $email_data['to'] = $creditMailID;
            $email_data['name'] = $request->name;
			$email_data['url'] = $loginUrl;			
			
			$to = $creditMailID;
            $subject = "Evaluation Customer Activation";
			$message = "
							<html>
							<head>
							<title>Evaluation email</title>
							</head>
							<body>
							<p>This email related to Activate Account!</p>
							<table>
							<tr>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Your Email ID:</th>
							<th style='text-align: left;background-color: rgb(250,209,96);padding: 6px 0px 7px 7px;'>Click Here:</th>
							</tr>
							<tr>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$creditMailID."</td>
							<td style='text-align: left;background-color: rgb(219,234,249);padding: 6px 0px 7px 7px;'>".$loginUrl."</td>
							</tr>
							</table>
							</body>
							</html>
							";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <sandeepv803@gmail>' . "\r\n";
				mail($to,$subject,$message,$headers);
				/* Email Start*/
				
		Session::flash('alert-success', 'Normal Account successfully registered. Please check your mail and activate !!');
		return redirect('login');
		}
	}
	
	 public function verify(Request $request,$id)
    {          
		$data = User::find($id);
        $data->status = 1;
        $data->save();
        Session::flash('alert-success', 'Account successfully activated');
		return redirect('login');    }
    public function dashboard_bank()
    {
		
        return view('evaluation.bank.dashboard');   
    }
	 public function dashboard_corporate()
    {
        return view('evaluation.corporate.dashboard');   
    }
	 public function dashboard_nbfc()
    {
        return view('evaluation.nbfc.dashboard');   
    }
	 public function dashboard_customer()
    {
        return view('evaluation.customer.dashboard');   
    }
   
    public function update_user(Request $request) { 
		$this->validate($request, [
            'photo' => 'mimes:png,gif,jpeg'
        ]);      

        $data = User::find(Auth::id());
        $data->mobile = $request->mobile;  
        $data->ememergency_contact_no = $request->ememergency_contact_no; 

        if (!empty($request->photo)) { // Check null image
            //Image uploader plugin save            
            $fileextenstion = $request->file('photo')->getClientOriginalExtension();
            //$full_file_name = ($request->file('photo')->getClientOriginalName());
            //$fileName = pathinfo($full_file_name, PATHINFO_FILENAME) . "_" . time() . '.' . $fileextenstion;
            $fileName = time() . '.' . $fileextenstion;

            //Thumb
            $image = $request->file('photo');
            $thumbPath = base_path() . '/public/images/profile/thumb/';
            $thumb_img = Image::make($image->getRealPath());
            // resize the image to a width of 200 and constraint aspect ratio (auto height)
            $thumb_img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumb_img->save($thumbPath . '/' . $fileName, 80);
            //Original Image
            $destinationPath = base_path() . '/public/images/profile/';
            $image->move($destinationPath, $fileName);

            $image_url = $data->photo;
            if (!empty($image_url)) {
                $thumbImg = $thumbPath . $image_url;
                if (file_exists($thumbImg)) {
                    unlink($thumbImg);
                }
                $originalImg = $destinationPath . $image_url;
                if (file_exists($originalImg)) {
                    unlink($originalImg);
                }
            }
            $data->photo = $fileName;
        }

        
        $data->save();
        flash('User updated successfully.')->success();
        return redirect('user_profile/detail');
    } 

     
	/*Code Start by Manvendra*/
	function userAndAsset($id = NULL){
		if(!empty($id)) {
        $selectedUSerAssets = array();
        $id = \App\Helpers\Common::decodeParam($id);
		$userDetails = User::select('name as username','id as user_id')->where('id',$id)->first(); 
        $companyAssetdetails = CompanyAsset::select('*')->orderBy('id', 'desc')->get();
		//$userassets = UserAsset::select('*')->where('user_id',$id)->orderBy('id', 'desc')->get();
		$userassets = UserAsset::select('company_assets_id','id')->where('user_id',$id)->orderBy('id', 'desc')->get();
		//$this->p($userassets);
		$i=1;
		foreach($userassets as $userasset){
			$selectedUSerAssets[$i++]=$userasset['company_assets_id'];
		}
		//$this->p($selectedUSerAssets); //die();
        return view('admin.user.addAsset')
            ->with('page_title',$this->page_title)
            ->with('listing',$this->listing)
            ->with('companyAssetdetails',$companyAssetdetails)
			->with('userDetails',$userDetails)
			->with('selectedUSerAssets',$selectedUSerAssets)
            ->with('breadcrumb',$this->breadcrumb);
		}		
	}

	function storeAssets(Request $request){
		$data = $request->all();        
        $asset_ids = $data['asset_ids'];
		if(count($asset_ids>0)) {
            foreach ($asset_ids as $asset_id) {
                $userasset = new UserAsset;
                $userasset->user_id = $request->user_id;
                $userasset->company_assets_id = $asset_id;
                $userasset->created_by = Auth::user()->id;
                $userasset->save();
            }
            $request->session()->flash('alert-success', trans('message.assetsmappedaddsuccess'));
            return redirect('list');
        }
		$request->session()->flash('alert-error', trans('message.assetsmappedadderror'));
	 return redirect('list');
	}
	/*Code End by Manvendra*/
   
	/*-------------Sandeep Frontend Methods End--------------------*/
}
