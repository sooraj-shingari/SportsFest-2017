@include('header')
@section('bodyContent')

    
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sports Fest</title>
	<link rel="stylesheet" type="text/css" href="css/css/sweetalert.css">
        <!-- Fonts -->
      
        <!-- Styles -->
        <script type="text/javascript" src="js/sweetalert.min.js"></script>
       <style>
           #rcorners1 {
    border-radius: 25px;
    background: #FF4500;
    padding: 20px; 
    width: 500px;
        
}
       </style>
      
       <script type="text/javascript">
       function showPrevious()
       {
       	document.getElementById("showTable3").style.display='block';
       }
       </script>
       
       <script type="text/javascript">
       
       function getName(model)
  {
    var d;
            $.ajax({
                type: 'GET',
                url: '../getCaptainName',
                data: {
                   
                    'lib': model
                  
                    
                },

                success: function (data) {
                   d=JSON.parse(data);

                   if(d.error==false)
                   {
                    
                    document.getElementById("sub").disabled = false;
                    document.getElementById("captainid").style.color='green';
                  }
                    else
                    {
                      document.getElementById("sub").disabled = true;
                      document.getElementById("captainid").style.color='red';
                    }
                    $("#captainid").html(d.msg);
                }
    });
          }
          
       </script>
       <script type="text/javascript">

           function getCoordinator(id)
           {
                        $.ajax({
                type: 'GET',
                url: '../getApex',
                data: {
                   
                    'eventId': id
                  
                    
                },

                success: function (data) {
                
                    var table = document.getElementById("showTable");
                    
                    document.getElementById("showTable3").style.display='block';
                    $("#showTable").html(data);
                   
                }
            });
                               $.ajax({
                type: 'GET',
                url: '../getCoordinator',
                data: {
                   
                    'eventId': id
                  
                    
                },

                success: function (data) {
                console.log(data);
                  
                    $("#showTable2").html(data);
                    
                }
            });
           }
       </script>
    </head>
    <body>
     @if(Session::has('error'))
        
        @if(Session::get('error'))
        <script>
            swal( "Error","{!! Session::get('mssg') !!}",  "error");
            </script>
        @else
        <script>
            swal( "Success","{!! Session::get('mssg') !!}",  "success");
            </script>
        @endif
        
    @endif
        <section id="page-header" class="visual color7">
            <div class="container">
                <div class="text-block">
                    <div class="heading-holder">
                        <h1><i>Student Committe Members</i></h1>
                    </div>
                    </div>
            </div>
        </section>
        <br>
        <br>
        <?php 
        if(Auth::check())
        {
        
        if(Auth::user()->email=='5988') 
                        {?>
                        <section>
                        
            <div class="container">
            <form method="POST" action="{{ url('/addCommitteMembers') }}">
           {{ csrf_field() }}

            <center><h2>Add Coordinator</h2></center>
            
            <hr>
            <div  class="jumbotron">
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <label for="EventName">Select Event</label>
            </div>
            <div class="col-md-3">
                <select class="form-control" id="event" name="event" required>
                    <option value="">Choose One</option>
                    <?php echo json_encode($Event_Name);?>
                    @foreach($Event_Name as $en)

                    <option value="{{ $en['name'] }}">{{ $en['name'] }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <label for="EventName">Coordinator Type</label>
            </div>
            <div class="col-md-3">
                <select class="form-control" id="coordinator" name="coordinator" required>
                    <option value="">Choose One</option>
                    <option value="APEX">Add Student Apex</option>
                    <option value="COORDINATOR">Add Student Coordinator</option>
                </select>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <label for="id">Student LibId</label>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="id" onkeyup ="getName(this.value)" required />
                 <span id="captainid" style="color: red;font-size: 80%;">Kindly Enter LibraryId Of The Student</span>
            </div>
            
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <label for="Number">Contact Number</label>
            </div>
            <div class="col-md-3">
               <input type="number" class="form-control" name="number" min="10"  />
            </div>
            </div>
            <br>
            <div class="row">
            <center><button type="submit" id="sub" class="btn btn-success">Submit</button></center>
            </div>
            </div>
            </form>
            <div class="row">
            <button type="submit" id="sub" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View/Update Previous Coordinator</button>
            </div>
            </div>
            <br>
            
        </section>
         <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>Select Event</b></center></h3>
        </div>
        <div class="modal-body" id="rule">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-2">
                <label for="EventName">Select Event</label>
            </div>
            <div class="col-md-3">
                <select class="form-control" id="event" name="event"  onclick="getCoordinator(this.value);" required>
                    <option value="">Choose One</option>
                    <?php echo json_encode($Event_Name);?>
                    @foreach($Event_Name as $en)

                    <option value="{{ $en['id'] }}">{{ $en['name'] }}</option>
                    @endforeach
                </select>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <center><button type="button" class="btn btn-success" data-dismiss="modal" >Submit</button></center>
        </div>
      </div>
    </div>
  </div>
    <div id="showTable3" style="display: none;">
            <section>
            
            <div class="container">
            <center><h2>Apex Coordinator</h2></center>
            <br>
            <hr>
            <div  class="">
            <div class="row">
                <table  class="table table-responsive table-stripped">
                    <thead>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Library Id</th>
                        <th>Contact No.</th>
                        <th>Branch</th>
                        <th>Year</th>
                        <th>Remove</th>
                        
                    </thead>
                    <tbody id="showTable">
                        
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </section>
        <br>
        <section>
         
            <div class="container">
            <center><h2>Student Coordinator</h2></center>
            <br>
            <hr>
            <div  class="">
            <div class="row">
                <table  class="table table-stripped ">
                    <thead>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Library Id</th>
                        <th>Contact No.</th>
                        <th>Branch</th>
                        <th>Year</th>
                        <th>Remove</th>
                    </thead>
                    <tbody id="showTable2">
                             
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </section>
        </div>   
            
        
                        <?php }
                        else
                        {
                         ?>
                        
        <section>
            <div class="container">
            <div  class="jumbotron">
            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-2">
                <label for="EventName">Select Event</label>
            </div>
            <div class="col-md-3">
                <select class="form-control" id="event" name="event" onchange="getCoordinator(this.value);" required>
                    <option value="">Choose One</option>
                    <?php echo json_encode($Event_Name);?>
                    @foreach($Event_Name as $en)

                    <option value="{{ $en['id'] }}">{{ $en['name'] }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            </div>
            </div>
        </section>
        <div id="showTable3" style="display: none;">
            <section>
            <center><h2>Apex Coordinator</h2></center>
            <br>
            <hr>
            <div class="container">
            <div  class="jumbotron">
            <div class="row">
                <table  class="table table-responsive table-stripped table-bordered">
                    <thead>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Library Id</th>
                        <th>Contact No.</th>
                        <th>Branch</th>
                        <th>Year</th>
                        
                    </thead>
                    <tbody id="showTable">
                        
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </section>
        <br>
        <section>
         <center><h2>Student Coordinator</h2></center>
            <br>
            <hr>
            <div class="container">
            <div  class="jumbotron">
            <div class="row">
                <table  class="table table-stripped table-bordered">
                    <thead>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Library Id</th>
                        <th>Contact No.</th>
                        <th>Branch</th>
                        <th>Year</th>
                    </thead>
                    <tbody id="showTable2">
                             
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </section>
        </div>
 <?php }
                        }
                        else
                        {
                         ?>
                        
        <section>
            <div class="container">
            <div  class="jumbotron">
            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-2">
                <label for="EventName">Select Event</label>
            </div>
            <div class="col-md-3">
                <select class="form-control" id="event" name="event" onchange="getCoordinator(this.value);" required>
                    <option value="">Choose One</option>
                    <?php echo json_encode($Event_Name);?>
                    @foreach($Event_Name as $en)

                    <option value="{{ $en['id'] }}">{{ $en['name'] }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            </div>
            </div>
        </section>
        <div id="showTable3" style="display: none;">
            <section>
            <center><h2>Apex Coordinator</h2></center>
            <br>
            <hr>
            <div class="container">
            <div  class="jumbotron">
            <div class="row">
                <table  class="table table-responsive table-stripped table-bordered">
                    <thead>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Library Id</th>
                        <th>Contact No.</th>
                        <th>Branch</th>
                        <th>Year</th>
                        
                    </thead>
                    <tbody id="showTable">
                        
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </section>
        <br>
        <section>
         <center><h2>Student Coordinator</h2></center>
            <br>
            <hr>
            <div class="container">
            <div  class="jumbotron">
            <div class="row">
                <table  class="table table-stripped table-bordered">
                    <thead>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Library Id</th>
                        <th>Contact No.</th>
                        <th>Branch</th>
                        <th>Year</th>
                    </thead>
                    <tbody id="showTable2">
                             
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </section>
        </div>
 <?php }?>
        
    </body>
        

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/login.js"></script>
</body>
  @include('footer')
<div id="rules" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">RULES</h3>
        </div>
        <div class="modal-body" id="rule">
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
</html>

