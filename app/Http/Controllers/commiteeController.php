<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
// .........................SHREY...............................
class commiteeController extends Controller
{
 public function _construct(){
        $this->middleware('auth');
    }

	 public function studentCommittee(){



	 	//  EVENTS
	 	$event_name=DB::table('event_details')->get();
	 	$i=0;
	 	foreach ($event_name as $e) {

	 		$event_arr[$i]['name']=$e->Event_name;
	 		$event_arr[$i]['id']=$e->E_Id;
	 		$i++;
	 		# code...
	 	}
	 	//echo json_encode($event_arr);

	 	

	 	return view('show_student_committe')->with('Event_Name',$event_arr);

		
	}
	public function getStudentApex()
	{


		$e_id=$_GET['eventId'];

		//  STUDENT APEX 

	 	$apex=DB::table('student_committee')->where([['Type','=','APEX'],['Event_id','=',$e_id]])->get();
	 	$i=0;
		if(count($apex)!=0)
		{
	 	foreach ($apex as $lib_id) {
	 		//$apex_Id[$lib_id->Id]=$lib_id->Id;

	 	//$apex_phone[$lib_id->Id]=$lib_id->phone_no;

	 	$details=DB::table('studentprimdetail')->where('Lib_Card_No',$lib_id->Student_id)->first();
	 	//$apex_name[$lib_id->Id]=$details->Name;

		$event=DB::table('event_details')->where('E_Id',$e_id)->first();
		//$apex_event[$lib_id->Id]=$event->Event_name;

		$branch=DB::table('dept_detail')->where('Did',$details->Branch_id)->first();
		//$apex_branch[$lib_id->Id]=$branch->Branch;

		$apex_details[$i]['Aname']=$details->Name;
		$apex_details[$i]['Ayear']=$details->Year;
		$apex_details[$i]['Aphone']=$lib_id->phone_no;
		$apex_details[$i]['Aevent']=$event->Event_name;
		$apex_details[$i]['Abranch']=$branch->Branch;
		$apex_details[$i]['Alibraryid']=$lib_id->Student_id;
		$i++;
	 	}
	 
	 	$i=1;
	 	foreach ($apex_details as $det) 
	 	{
	 		
	 	
		?>
		
		<tr>

		
		
			<td><?php echo $i++;?></td>
			<td><?php echo $det['Aname'];?></td>
			<td><?php echo $det['Alibraryid'];?>
			</td>
			<td><?php echo $det['Aphone'];?></td>
			<td><?php echo $det['Abranch'];?></td>
			<td><?php echo $det['Ayear'];?></td>
			<?php
			if(Auth::check())
        		{
       			 if(Auth::user()->email=='5988') 
       			 {
       			 ?>
       			 
       			 <td>
       			 <form method="post" action="<?php echo url('/removeApexCoordinater'); ?>">
			<?php echo csrf_field(); ?>
		<button type="submit" align="center"id="del" class="btn btn-danger" name="studentId" value="<?php echo $det['Alibraryid'];?>" ><i class="fa fa-times"></i></button></form></td>
       			 <?php
       			 }
       			 }
			?>
			
		
		
		</tr>
		<?php
		}
		}
		else
		{
		?>
		<tr>
		No Data Found.....
		</tr>
		<?php
		}

	 	
	
	 	


	}





	public function getStudentCoordinator()
	{
		$e_id=$_GET['eventId'];


	 	//STUDENT COORDINATOR
	 

	 	$coordinator=DB::table('student_committee')->where([['Type','=','COORDINATOR'],['Event_Id','=',$e_id]])->get();
	 	$i=0;
	 	if(count($coordinator)!=0)
	 	{
	 	foreach ($coordinator as $libr_id) {
	 		//$coordinator_Id[$libr_id->Id]=$libr_id->Id;

	 	//$coordinator_phone[$libr_id->Id]=$libr_id->phone_no;

	 	$details=DB::table('studentprimdetail')->where('Lib_Card_No',$libr_id->Student_id)->first();
	 	//$coordinator_name[$libr_id->Id]=$details->Name;

		$event=DB::table('event_details')->where('E_Id',$e_id)->first();
		//$coordinator_event[$libr_id->Id]=$event->Event_name;

		$branch=DB::table('dept_detail')->where('Did',$details->Branch_id)->first();
		//$coordinator_branch[$libr_id->Id]=$branch->Branch;


			//echo json_encode($coordinator_name);

		$coordinator_details[$i]['Cname']=$details->Name;
		$coordinator_details[$i]['Cyear']=$details->Year;
		$coordinator_details[$i]['Cphone']=$libr_id->phone_no;
		$coordinator_details[$i]['Cevent']=$event->Event_name;
		$coordinator_details[$i]['Cbranch']=$branch->Branch;
		$coordinator_details[$i]['Clibraryid']=$libr_id->Student_id;
		$i++;
	 	}

	 	$i=1;
	 	foreach ($coordinator_details as $det) 
	 	{
	 		# code...
	 	
		?>
		
		<tr>
		
		
		
			<td ><?php echo $i++;?></td>
			<td><?php echo $det['Cname'];?></td>
			<td><?php echo $det['Clibraryid'];?></td>
			<td ><?php echo $det['Cphone'];?></td>
			<td ><?php echo $det['Cbranch'];?></td>
			<td ><?php echo $det['Cyear'];?></td>
			
			<?php
			if(Auth::check())
        		{
       			 if(Auth::user()->email=='5988') 
       			 {
       			 ?>
       			 
       			 <td>
       			 <form method="post" action="<?php echo url('/removeApexCoordinater'); ?>">
			<?php echo csrf_field(); ?>
		<button type="submit" align="center"id="del" class="btn btn-danger" name="studentId" value="<?php echo $det['Clibraryid'];?>" ><i class="fa fa-times"></i></button></td></form>
       			 <?php
       			 }
       			 }
			?>
			
		
		
		
		</tr>
		<?php
		}
		}
		else
		{
		?>
		<tr>
		No Data Found.....
		</tr>
		<?php
		}


	}
	public function removeCommitteMember()
	{
		if(!Auth::check())return redirect('/');

		$pmail=Auth::user()->email;

		if($pmail=='5988')
		{
		$studentId=$_POST['studentId'];
		$exist=DB::table('student_committee')->where('Student_id',$studentId)->first();
		if(count($exist)==0)
		{
		$response['error']=true;
		$response['mssg']="Record doesn't exist";
     			Session::flash('mssg', $response['mssg']);
                         Session::flash('error',$response['error']);
    			return redirect()->back();
		}
		else
		{
		DB::table('student_committee')->where('Student_id',$studentId)->delete();
		
			$response['error']=false;
			$response['mssg']="Successfully Removed";
     			Session::flash('mssg', $response['mssg']);
                        Session::flash('error',$response['error']);
    			return redirect()->back();
		}
	}
	else
	{
		$response['error']=true;
		$response['mssg']="You are not authorized";
		 return redirect()->back()->with('alert', $response['mssg'])->with('error', $response['error']);
	}
		
	}

	public function addApexCoordinator()
	{
	
	
	
	
	
	 if(!Auth::check())return redirect('/');

   
       
		$eventName=$_POST['event'];
		$studentId=strtoupper($_POST['id']);
		$type=$_POST['coordinator'];
		$phone=$_POST['number'];


		$pmail=Auth::user()->email;
		/* $eventName='Cricket';
		$studentId='1519EN1116';
		$type='APEX';
		$phone='1232341223234';*/
		if($pmail=='5988')
		{

		 $exist_studentId=DB::table('studentprimdetail')->where('Lib_Card_No',$studentId)->get();
        if(count($exist_studentId)!=0)
           {
        $cap=DB::table('student_committee')->select('*')->where('Student_id',$studentId)->first();
        $branch_course=DB::table('studentprimdetail')->select('Name','Course_id','Branch_id','Sem_id')->where('Lib_Card_No',$studentId)->first();
        if($branch_course->Sem_id!=21)
        {
            
                if(count($cap)==0)
                    {

                        $event_id=DB::table('event_details')->select('E_Id')->where('Event_name',$eventName)->first();
                        DB::table('student_committee')->insert(['Student_id'=>$studentId,'Event_id'=>$event_id->E_Id,'phone_no'=>$phone,'created_by'=>$pmail,'Type'=>$type]);   
                       // echo $event_id->E_Id;

                        $response['error']=false;
                        $response['mssg']=$branch_course->Name." (".$studentId.") "." added as ".$type;
                        //echo json_encode($response);
                         Session::flash('mssg', $response['mssg']);
                         Session::flash('error',$response['error']);
    			return redirect()->back();

                   }
               else
                   {
                        
                        
                                 $response['error']=true;
                                $response['mssg']="Oops !! The Student is  already an Event Apex or Coordinator";
                                //echo json_encode($response);
    			Session::flash('mssg', $response['mssg']);
                         Session::flash('error',$response['error']);
    			return redirect()->back();
                            
                   }
        }
       else
       {
        
                 $response['error']=true;
                $response['mssg']="B.Tech First Year not allowed to participate";
               // echo json_encode($response);

  Session::flash('mssg', $response['mssg']);
                         Session::flash('error',$response['error']);
    			return redirect()->back();
         
          
        }
}
else
{
    $response['error']=true;
    $response['mssg']=" Invalid Library Id";
    //echo json_encode($response);
    Session::flash('mssg', $response['mssg']);
                         Session::flash('error',$response['error']);
    			return redirect()->back();
   }

}
else
	{
		$response['error']=true;
		$response['mssg']="You are not authorized";
		 Session::flash('mssg', $response['mssg']);
                         Session::flash('error',$response['error']);
    			return redirect()->back();
	}
		//return view('addApexCoordinator');
	}


}