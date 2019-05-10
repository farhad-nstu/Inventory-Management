<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Setting(){
        $setting = DB::table('settings')->first();
        return view('setting', compact('setting'));
    }

    public function UpdateWebsite(Request $request,$id)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|max:255',
            'company_email' => 'required|max:255',
            'company_mobile' => 'required||max:255',
            'company_zipcode' => 'required',
          ]);


            //return $request->all();//FOR CHECKING
      $data = array();
      $data['company_name'] = $request->company_name;
      $data['company_address'] = $request->company_address;
      $data['company_email'] = $request->company_email;
      $data['company_phone'] = $request->company_phone;
      $data['company_mobile'] = $request->company_mobile;
      $data['company_city'] = $request->company_city;
      $data['company_country'] = $request->company_country;
      $data['company_zipcode'] = $request->company_zipcode;
      $image=$request->file('company_logo');
      if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/company/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['company_logo']=$image_url;
                $delete = DB::table('settings')
                          ->where('id',$id)
                          ->first();
                $photo = $delete->company_logo;
                unlink($photo);
                $company=DB::table('settings')
                        ->where('id',$id)
                         ->update($data);
              if ($company) {
                 $notification=array(
                 'messege'=>'Successfully Company Information Updated',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{
              return Redirect()->back();
              
            }
        }else{
            $old_photo=$request->old_photo;
            if ($old_photo) {
                $data['company_logo']=$old_photo;
                $company=DB::table('settings')
                        ->where('id',$id)
                        ->update($data);
              if ($company) {
                 $notification=array(
                 'messege'=>'Successfully Company Information Updated',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }
        }
      
    }

}