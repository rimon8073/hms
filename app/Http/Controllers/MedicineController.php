<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MedicineController extends Controller
{
    private $table = 'medicine';
    public function medicineadd(){
      $data=array();
      $data['categorylist'] = DB::table('hms_medicine_genetic')->get();

      return view('admin.pages.medicineadd',$data);
    }
    public function medicinelist(){
      $medicinelist = DB::table($this->table)->get();
    return view('admin.pages.medicinelist',compact('medicinelist'));
    }
    public function medicineinsert(Request $request)
      {
          $data = array();
          $time = time();
          $data['name'] = $request->name;
          $data['category'] = $request->category;
          $data['description'] = $request->description;
          $data['price'] = $request->price;
          $data['manufacture'] = $request->manufacture;
          $data['status'] = $request->status;
          $data['created_at'] = date("Y-m-d H:i:s",$time);
          $result = DB::table('medicine')->insert($data);
          return redirect()->route('medicinelist');
      }
      public function medicineedit($id){
        $medicine = DB::table($this->table)->where('id',$id)->first();
        return view('admin.pages.medicineedit',compact('medicine'));
      }
      public function medicineupdate(Request $request, $id)
      {
        $data= array();
        $time = time();
        $data['name']=$request->name;
        $data['category']=$request->category;
        $data['description']=$request->description;
        $data['price']=$request->price;
        $data['manufacture']=$request->manufacture;
        $data['status']=$request->status;
        $data['created_at']=date("Y-m-d H:i:s",$time);
        $result = DB::table('medicine')->where('id',$id)->update($data);
        return redirect()->route('medicinelist');
      }
      public function medicinedelete($id)
      {
        $medicinelist = DB::table('medicine')->where('id',$id)->delete();
        //Set Message
           \Session::flash('message','Delete sucessfuly');
        return redirect()->route('medicinelist');
      }

  public function invoiceadd(){
    $data=array();
    $data['m_list']=DB::table('medicine')->get();
    $data['patient_code'] = DB::table('patient')->get();
  return view('admin.pages.invoiceadd',$data);
}
  public function invoicelist(){
    $invoicelist = DB::table('m_invoice')->get();
return view('admin.pages.invoicelist',compact('invoicelist'));
}
  public function invoiceinsert(Request $request){
    $data = array();
    $time = time();
    $data['name'] = $request->name;
    $data['category'] = $request->category;
    $data['description'] = $request->description;
    $data['price'] = $request->price;
    $data['manufacture'] = $request->manufacture;
    $data['status'] = $request->status;
    $data['created_at'] = date("Y-m-d H:i:s",$time);
    $result = DB::table('m_invoice')->insert($data);

    return view('admin.pages.invoicelist');
}
 public function medicine_geneticadd(){
  return view('admin.pages.medicine_geneticadd');
 }
 public function medicine_geneticinsert(Request $request){
    $data = array();
    $time = time();
    $data['name'] = $request->name;
    $data['description'] = $request->description;
    $data['status'] = $request->status;
    $data['created_at'] = date("Y-m-d H:i:s",$time);
    $result = DB::table("hms_medicine_genetic")->insert($data);
    //Set Message
    \Session::flash('message','Insert sucessfully');
     return redirect()->route('medicine_geneticlist');
    
   }
    public function medicine_geneticlist(){
  $medicine_geneticlist = DB::table('hms_medicine_genetic')->get();
  return view('admin.pages.medicine_geneticlist',compact('medicine_geneticlist'));

   }
   public function medicine_geneticedit($id){
  $genetic = DB::table('hms_medicine_genetic')->where('id',$id)->first();
  return view('admin.pages.medicine_geneticedit',compact('genetic'));
   }
    public function medicine_geneticview($id){
    $genetic_view = DB::table('hms_medicine_genetic')->where('id',$id)->first();
    return view('admin.pages.medicine_geneticview',compact('genetic_view'));
  }
  public function medicine_geneticupdate(Request $request,$id){
        $data= array();
        $time = time();
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['status']=$request->status;
        $data['created_at']=date("Y-m-d H:i:s",$time);
        $result = DB::table('hms_medicine_genetic')->where('id',$id)->update($data);
        return redirect()->route('medicine_geneticlist');
  }

   public function medicine_geneticdelete($id)
  {
  $medicine_geneticlist = DB::table('hms_medicine_genetic')->where('id',$id)->delete();
    //Set Message
       \Session::flash('message','Delete sucessfuly');
    return redirect()->route('medicine_geneticlist');
  }
}
