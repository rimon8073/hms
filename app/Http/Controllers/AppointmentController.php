<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AppointmentController extends Controller
{
    private $table = 'appointment';
public function appointmentadd(){
   $data=array();
   $data['dept_list']=DB::table('department')->get();
    $data['dr_list']=DB::table('doctor')->get();
  return view('admin.pages.appointmentadd',$data);
}
    public function appointmentinsert (Request $request)
    {
        $data = array();
        $time = time();
        $data['appointmentdate'] = $request->appointmentdate;
        $data['branch']=$request->branch;
        $data['speciality']=$request->speciality;
        $data['doctor']=$request->doctor;
        $data['shift']=$request->shift;
        $data['name']=$request->name;
        $data['mobile']=$request->mobile;
        $data['address']=$request->address;
        $data['age']=$request->age;
        $data['gender']=$request->gender;
        $data['created_at']=date("Y-m-d H:i:s",$time);
        $result =DB::table('appointment')->insert($data);
        return redirect()->route('appointmentlist');
    }
    public function appointmentuserinsert (Request $request)
    {
        $data = array();
        $time = time();
        $data['appointmentdate'] = $request->appointmentdate;
        $data['branch']=$request->branch;
        $data['speciality']=$request->speciality;
        $data['doctor']=$request->doctor;
        $data['shift']=$request->shift;
        $data['name']=$request->name;
        $data['mobile']=$request->mobile;
        $data['address']=$request->address;
        $data['age']=$request->age;
        $data['gender']=$request->gender;
        $data['created_at']=date("Y-m-d H:i:s",$time);
        $result = DB::table('appointment')->insert($data);
        //Set Message
           \Session::flash('message','Data Inserted sucessfuly');
        return view('front.pages.appointment',compact('result'));
    }
    public function appointmentlist(){
      $appointmentlist = DB::table($this->table)->get();
      return view('admin.pages.appointmentlist',compact('appointmentlist'));
    }
    public function appointmentview($id){
      $appointmentview = DB::table('appointment')->where('id',$id)->first();
      return view('admin.pages.appointmentview',compact('appointmentview'));
    }
    public function appointmentedit($id)
    {
        $appointment = DB::table('appointment')->where('id',$id)->first();
        return view('admin.pages.appointmentedit',compact('appointment'));
    }
    public function appointmentupdate(Request $request,$id){
      $data = array();
      $time = time();
      $data['appointmentdate'] = $request->appointmentdate;
      $data['branch'] = $request->branch;
      $data['speciality'] = $request->speciality;
      $data['doctor'] = $request->doctor;
      $data['shift'] = $request->shift;
      $data['name']=$request->name;
      $data['mobile']=$request->mobile;
      $data['address']=$request->address;
      $data['age']=$request->age;
      $data['gender']=$request->gender;
      $data['created_at']=date("Y-m-d H:i:s",$time);
      $result = DB::table('appointment')->where('id',$id)->update($data);
      //Set Message
         \Session::flash('message','Data Update sucessfuly');
      return redirect()->route('appointmentlist');
    }
    public function appointmentdelete($id)
    {
      $appointmentlist = DB::table('appointment')->where('id',$id)->delete();
      //Set Message
         \Session::flash('message','Delete sucessfuly');
      return redirect()->route('appointmentlist');
    }

}
