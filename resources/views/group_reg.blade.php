@include('header')
@section('bodyContent')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sports Fest</title>

        <!-- Fonts -->
      
        <!-- Styles -->
       <style>
           #rcorners1 {
    border-radius: 25px;
    background: #FF4500;
    padding: 20px; 
    width: 500px;
        
}
       </style>
    </head>
    <body>
        <section id="page-header" class="visual color7">
            <div class="container">
                <div class="text-block">
                    <div class="heading-holder">
                        <h1><i>Registered Student Report</i></h1>
                    </div>
                    </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div id="form_div2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Event name</th>
                                <th>Team Name</th>
                                <th>Captain Name</th>
                                <th>Members</th>
                                <th>Department</th>
                                <th>Contact No</th>
                                <th>Team Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=0;?>
                            @foreach($det as $details)
                            <tr>
                            <td>{{++$i}}</td>
                                <td>{{$details->event_name}}</td>
                                <td>{{$details->Team_Name}}</td>
                                <td>{{$details->Name}}({{$details->Captain_Lib_Id}})</td>
                                @if(isset($members[$i-1]))
                                <td>{{$members[$i-1]}}</td>
                                @else
                                <td></td>
                                @endif
                                <td>{{$details->Branch}}</td>
                                <td>{{$details->MOB}}</td>
                                <td>{{$details->Status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- end container -->  
        </section>

    </body>
        

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

  @include('footer')
</html>
