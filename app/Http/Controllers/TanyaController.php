<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;

class TanyaController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }


     public function individualEvents(){
        if(Auth::check()){
        
        if(Auth::user()->Hash3=="Student"){
        return redirect('/');
        }
        
        $Events= DB::table('subevents')->join('event_details','subevents.Event_Id','=','event_details.E_Id')->where('event_details.Type','=','I')->select('subevents.*','event_details.*')->get();
        
         if(Auth::user()->Hash3=="APEX"){
         
         $lib=DB::table('studentprimdetail')->where('Uni_Roll_No',Auth::user()->email)->first();
         $lib=$lib->Lib_Card_No;
         
           
           
            $Events= DB::table('subevents')->join('event_details','subevents.Event_Id','=','event_details.E_Id')->where('event_details.Type','=','I')->select('subevents.*','event_details.*')->get();
           $event_details=$Events;
           $Events=[];
           foreach($event_details as $e){
           
            if(DB::table('student_committee')->where('Student_id',$lib)->where('Event_Id','=',$e->Event_Id)->count()>0)
                $Events[]=$e;
        }
           
         }
       

        
        return view('paidReport')->with('events',$Events);
        
        }
        else
        {
            redirect("/");
        }
        
    }
    
    
     public function registeredStudents(){
     
        if(Auth::check()){
        
         $Events= DB::table('subevents')->join('event_details','subevents.Event_Id','=','event_details.E_Id')->where('event_details.Type','=','G')->select('subevents.*','event_details.*')->get();        
        $event_details=[];
        if(Auth::user()->Hash3=="Student"){
        return redirect('/');
        }
        
         if(Auth::user()->Hash3=="APEX"){
         
         $lib=DB::table('studentprimdetail')->where('Uni_Roll_No',Auth::user()->email)->first();
         $lib=$lib->Lib_Card_No;
         
           
              foreach($Events as $e){
           
            if(DB::table('student_committee')->where('Student_id',$lib)->where('Event_Id','=',$e->Event_Id)->count()>0)
                $event_details[]=$e;
        }
           }
           
        else{
        foreach($Events as $e){
            if(DB::table('core_commitee')->where('Pmail',Auth::user()->email)->where('Event_Id','like','%'.$e->Event_Id.'%')->count()>0)
                $event_details[]=$e;
        }
        }
        
        
        return view('registered')->with('events',$event_details);
        }
        else{
            return redirect("/");
        }
        
        
    }
    
    
 public function groupEventDetails(Request $request) {

    if(Auth::check()){
    //return view('event');
    $request=$request->all();
      //echo json_encode($request);

  $Test= DB::table('grp_reg')->join('subevents','grp_reg.Sub_Event_Id','=','subevents.Sub_Event_Id')->join('studentprimdetail','grp_reg.Captain_Lib_Id','=','studentprimdetail.Lib_Card_No')->join('dept_detail','studentprimdetail.Branch_id','=','dept_detail.Did')->select('grp_reg.Captain_Lib_Id','grp_reg.Team_Name','subevents.Name as event_name','grp_reg.Team_Id','subevents.Sub_Event_Id','studentprimdetail.MOB','studentprimdetail.Name','dept_detail.Branch')->where('grp_reg.Sub_Event_Id','=',$request['event'])->get();

    $teams=[];
   $i=0;
    foreach ($Test as $t) {
    $teams[]=$t;
     $members=DB::table('members')->select('members.Member_Lib_Id','studentprimdetail.Name')->join('studentprimdetail','studentprimdetail.Lib_Card_No','=','members.Member_Lib_Id')->where('members.Team_Id',$t->Team_Id)->get();
      $mem[$i]="";
     
    
        if(count($members)!=0){
            
            foreach($members as $m){
           
            $mem[$i]=$mem[$i].$m->Name."( ".$m->Member_Lib_Id ." ), ";
            }
            $teams[$i++]->Status="REGISTERED";
        }
        else{
       
          $teams[$i++]->Status="PENDING";
        }
        
    }
        
     

    if(count($teams)==0){
     return view('message')->with('error',false)->with('message',"No registered students for this event");
    }
   
  
    return view('group_reg')->with('det', $teams)->with('members',$mem);
    
}
    return redirect("/");
}

public function individualEventDetails(Request $request) {
    if(Auth::check()){
    //return view('event');
    $request=$request->all();
    //echo json_encode($request);
    //$Test= DB::table('ind_reg')->join('subevents','ind_reg.Sub_Event_Id','=','subevents.Sub_Event_Id')->join('studentprimdetail','ind_reg.Lib_Id','=','studentprimdetail.Lib_Card_No')->join('dept_detail','studentprimdetail.Branch_id','=','dept_detail.Did')->select('ind_reg.Paid_Status','subevents.Name as event_name','studentprimdetail.Name','studentprimdetail.Lib_Card_No','studentprimdetail.MOB','dept_detail.Branch')->where('ind_reg.Sub_Event_Id','=',$request['event'])->get();
    //$Test->Yes=0;
        
        $data=array();
        $te=DB::table('ind_reg')->where('ind_reg.Sub_Event_Id',$request['event'])->join('subevents','ind_reg.Sub_Event_Id','=','subevents.Sub_Event_Id')->select('ind_reg.Paid_Status','ind_reg.Lib_Id','subevents.Name as event_name')->get();
        $i=0;
        $total_paid=0;
        //echo json_encode($te);
        foreach($te as $t){
        
        $data[$i]['event_name']=$t->event_name;
        $data[$i]['Paid_Status']=$t->Paid_Status;
        
        if($t->Paid_Status=='Y'){
        	$total_paid++;
        }
        $a=explode(',',$t->Lib_Id);
        	if(count($a)>1){
        		$data[$i]['stu_name']="";
        		$data[$i]['MOB']="";
        		$data[$i]['Lib_Card_No']="";
        		foreach($a as $ar){
        		
        			$det=DB::table('studentprimdetail')->where('Lib_Card_No',$ar)->join('dept_detail','studentprimdetail.Branch_id','=','dept_detail.Did')->select('studentprimdetail.Name','studentprimdetail.Lib_Card_No','studentprimdetail.MOB','dept_detail.Branch')->get();
        			
        			$data[$i]['stu_name']=$data[$i]['stu_name'].",".$det[0]->Name;
        			$data[$i]['Lib_Card_No']=$data[$i]['Lib_Card_No'].",".$det[0]->Lib_Card_No;
        			$data[$i]['MOB']=$data[$i]['MOB'].",".$det[0]->MOB;
        			$data[$i]['Branch']=$det[0]->Branch;
        			
        		}
        		
        	}
        	else{
        	
        		$det=DB::table('studentprimdetail')->where('Lib_Card_No',$t->Lib_Id)->join('dept_detail','studentprimdetail.Branch_id','=','dept_detail.Did')->select('studentprimdetail.Name','studentprimdetail.Lib_Card_No','studentprimdetail.MOB','dept_detail.Branch')->get();
        			
        			$data[$i]['stu_name']=$det[0]->Name;
        			$data[$i]['Lib_Card_No']=$det[0]->Lib_Card_No;
        			$data[$i]['MOB']=$det[0]->MOB;
        			$data[$i]['Branch']=$det[0]->Branch;
        	}
        	$i++;
        }
        //echo json_encode($Test);
       // $teams[];
       
       
      // echo json_encode($data);
        /*foreach($data as $t){
        if($t['Paid_Status']=='Y')
        $total_paid++;
        }*/
       // echo $total_paid;
       // echo $total_paid;
        
    return view('Individual')->with('det', $data)->with('total_paid',$total_paid);
}
     return redirect("/");
}

   
}
