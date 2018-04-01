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
                        <h1><i>Group Summary Report</i></h1>
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
                                <th>Event Name</th>
                                <th>Total Team Registrations</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;?>
                            <?php
                           
                            foreach($data as $det){ ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $det->Name;?></td>
                                <td><?php echo $det->total_registrations;?></td>
                                
                            </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                </div>
            </div><!-- end container -->  
        </section>

    </body>
        

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/login.js"></script>
</body>
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
