@include('header')

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
           ul {
    margin: 20px;
    padding: 0;
}

ul {
    counter-reset: foo;
    display: table;
}


        </style>
       
    </head>
    <body>
	<marquee HEIGHT=30><i style="font-size:150%;color:red;">**Payment Portal is now open!!</i></marquee>

          <section class="visual">
          
            <div class="container">
                <div class="text-block">
                    <div class="heading-holder">
                        <h1>SPORTS FEST</h1>
                    </div>
                    <p class="tagline"></p>
                    <div class="tagline">&nbsp; <p class="element">Come, Lets Play</p> &nbsp;</div>
                    <div class="infos">
                    <span class="info"><i class="fa fa-star"></i> RUN</span>
                    <span class="info"><i class="fa fa-star"></i> PLAY</span>
                    <span class="info"><i class="fa fa-star"></i> LEARN</span>
                    <span class="info"><i class="fa fa-star"></i> WIN</span>
                    </div>
                </div>
            </div>
            <img src="{!!  URL::to('upload/img-decor-01.jpg') !!}" alt="" class="bg-stretch">
        </section>

        <section id="event" class="section">
            <div class="container">
              <?php if(Auth::guest()){ ?>
                <div id="cta">
                    <a data-toggle="modal" data-target="#login" class="btn btn-primary rounded">
                      LOGIN
                      </a>

                </div>
                <?php }?>
            
                <div class="section-title text-center">
                    <h5>Just play.</h5>
                    <h3>Have fun. Enjoy the game.</h3>
                    <hr>
                </div><!-- end title -->

                <div class="row-fluid service-list">


                    <form action="#" method="POST">
                        <input type="hidden" name="e_id" id="e_id" value="1"> 
                        <div class="col-md-4 col-sm-6" data-toggle="modal" data-target="#rules9">
                            <div class="serviceBox">
                                <div class="service-icon withborder color1 hovicon effect-1 sub-a">
                                    <img src="{!!  URL::to('images/icons/icon_01.png') !!}" alt="">
                                </div>
                                <div class="service-content">
                                    <h3>Football</h3>
                                    <p>
                                      In football, you won’t go far, unless you know where the goalposts are.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form><!-- end col -->

                    <form action="#" method="POST">
                        <input type="hidden" name="e_id" id="e_id" value="2"> 
                        <div class="col-md-4 col-sm-6" data-toggle="modal" data-target="#rules10">
                            <div class="serviceBox">
                                <div class="service-icon withborder color2 hovicon effect-1 sub-a">
                                    <img src="{!!  URL::to('images/icons/icon_02.png') !!}" alt="">
                                </div>
                                <div class="service-content">
                                    <h3>Cricket</h3>
                                    <p>
                                        You can cut the tension with a cricket stump.
                                    </p>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </form>

                    <div class="col-md-4 col-sm-6" data-toggle="modal" data-target="#rules6">
                        <div class="serviceBox">
                            <div class="service-icon withborder color3 hovicon effect-1 sub-a">
                                <img src="{!!  URL::to('images/icons/icon_03.png') !!}" alt="">
                            </div>
                            <div class="service-content">
                                <h3>Volleyball</h3>
                                <p>
                                    Volleyball is 20 percent athleticness and 80 percent mental.
                                </p>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-4 col-sm-6" data-toggle="modal" data-target="#rules4">
                        <div class="serviceBox">
                            <div class="service-icon withborder color4 hovicon effect-1 sub-a">
                                <img src="{!!  URL::to('images/icons/icon_04.png') !!}" alt="">
                            </div>
                            <div class="service-content">
                                <h3>Basketball</h3>
                                <p>
                                    Basketball is a beautiful game when the five players on the court play with one heartbeat.
                                </p>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-4 col-sm-6" data-toggle="modal" data-target="#rules7">
                        <div class="serviceBox">
                            <div class="service-icon withborder color5 hovicon effect-1 sub-a">
                                <img src="{!!  URL::to('images/icons/icon_05.png') !!}" alt="">
                            </div>
                            <div class="service-content">
                                <h3>Badminton</h3>
                                <p>
                                    Talk with your racquet, play with your heart.
                                </p>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-4 col-sm-6" data-toggle="modal" data-target="#rules11">
                        <div class="serviceBox">
                            <div class="service-icon withborder color6 hovicon effect-1 sub-a">
                                <img src="{!!  URL::to('images/icons/icon_06.png') !!}" alt="">
                            </div>
                            <div class="service-content">
                                <h3>Lawn Tennis</h3>
                                <p>
                                    Dreams do come true if you keep believing in yourself. Anything is possible.
                                </p>
                            </div>
                        </div>                     
                    </div><!-- end col -->

                 <div class="col-md-4 col-sm-6" data-toggle="modal" data-target="#rules3">
                        <div class="serviceBox">
                            <div class="service-icon withborder color7 hovicon effect-1 sub-a">
                                <img src="{!!  URL::to('images/icons/icon_07.png') !!}" alt="">
                            </div>
                            <div class="service-content">
                                <h3>Table Tennis</h3>
                                <p>
                                   The more u hit the more u win.
                                </p>
                            </div>
                        </div>
                    </div>
                  <div class="col-md-4 col-sm-6" data-toggle="modal" data-target="#rules5">
                        <div class="serviceBox">
                            <div class="service-icon withborder color8 hovicon effect-1 sub-a">
                                <img src="{!!  URL::to('images/icons/icon_08.png') !!}" alt="">
                            </div>
                            <div class="service-content">
                                <h3>Pool</h3>
                                <p>
                                   There's nothing worse than good position if you miss the shot.
                                </p>
                            </div>
                        </div>
                    </div>
                  <div class="col-md-4 col-sm-6" data-toggle="modal" data-target="#rules1">
                        <div class="serviceBox">
                            <div class="service-icon withborder color9 hovicon effect-1 sub-a">
                                <img src="{!!  URL::to('images/icons/icon_10.png') !!}" alt="">
                            </div>
                            <div class="service-content">
                                <h3>Chess</h3>
                                <p>
                                   When you see a good move, look for a better one.
                                </p>
                            </div>
                        </div>
                    </div>
                  <div class="col-md-4 col-sm-6" data-toggle="modal" data-target="#rules2">
                        <div class="serviceBox" >
                            <div class="service-icon withborder color10 hovicon effect-1 sub-a">
                                <img src="{!!  URL::to('images/icons/icon_11.png') !!}" alt="">
                            </div>
                            <div class="service-content">
                                <h3>Athletics</h3>
                                <p>
                                   Some Peolpe want it to happen, Some wish it would happen,<br>And others... make it happen.
                                </p>
                            </div>
                        </div>
                    </div>
                   
                </div><!-- end row -->
            </div><!-- end container -->      
        </section>

        <section class="section c1">
            <img class="rocket hidden-xs" src="upload/rocket.png" alt="">
            <svg id="clouds" class="hidden-xs" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 85 100" preserveAspectRatio="none">
                <path d="M-5 100 Q 0 20 5 100 Z
                    M0 100 Q 5 0 10 100
                    M5 100 Q 10 30 15 100
                    M10 100 Q 15 10 20 100
                    M15 100 Q 20 30 25 100
                    M20 100 Q 25 -10 30 100
                    M25 100 Q 30 10 35 100
                    M30 100 Q 35 30 40 100
                    M35 100 Q 40 10 45 100
                    M40 100 Q 45 50 50 100
                    M45 100 Q 50 20 55 100
                    M50 100 Q 55 40 60 100
                    M55 100 Q 60 60 65 100
                    M60 100 Q 65 50 70 100
                    M65 100 Q 70 20 75 100
                    M70 100 Q 75 45 80 100
                    M75 100 Q 80 30 85 100
                    M80 100 Q 85 20 90 100
                    M85 100 Q 90 50 95 100
                    M90 100 Q 95 25 100 100
                    M95 100 Q 100 15 105 100 Z">
                </path>
            </svg>

            <div class="container">
                <div class="section-title text-center">
                    <h3>Meet The Developers.</h3>
                    <hr>
                  <div class="row">
                           <a target="_blank" href="http://www.facebook.com/kieterp" ><button type="button" class="btn btn-primary rounded">Team ERP</button>
                  </a></div><!-- end row -->
                </div><!-- end title -->

                
            </div><!-- end container -->  
  </section>
  
    </body>
        @include('footer')

  <script src="{!!  URL::to('js/jquery.min.js') !!}"></script>
  <script src="{!!  URL::to('js/bootstrap.js') !!}"></script>
  <script src="{!!  URL::to('js/login.js') !!}"></script>
</body>

<div id="rules1" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>RULES</b></center></h3>
        </div>

        <div class="modal-body" id="rule">
 <ul>
      <li>Both <b>Single</b> and <b>team entries</b> are allowed.</li> 
      <li>A total of<b> 4 members</b> in a team are allowed which may comprise of <b>Only boys or Only girls</b>.</li>
      <li>Each match will be of <b>20-20 min</b> To win a round, 3 or 4 players from a team should win. In case of 2-2, best player of the teams 
          will play a blitz of <b>5 min</b> each.</li>
<li> All the regular rules of Chess will be followed. </li><li><b>Touch and move</b> is mandatory.</li>
      <li>The player must have to use the same hand for moving the pieces and tapping the clock. </li>
      <li>In case of any discrepancy, <b>coordinator’s decision</b> is final.</li>
      <li>There can be <b>any number</b> of teams from each department. </li>
       </ul>
       <br>
       
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>sup
    </div>
  </div>
<div id="rules2" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>RULES</b></center></h3>
        </div>
        <div class="modal-body" id="rule"><ul>
        <li>In these events, the commands of the starter shall be <b>”on your marks”, “ set”</b> and when all competitors are steady, whistle will be sound.</li>
<li> If the participant begins before whistle he/she may be <b>disqualified.</b></li>
<li>In all race runs, each competitor must keep with in his/her allocated lane from start to finish.</li>
<li>Athlete must have <b>one foot in touch</b> with the ground at all times.</li>
<li>In running events (100m, 200m) the athletics are <b>not allowed</b> to choose any other track.</li>
<li>In 400m, running event after 1<sup>st</sup> round of race , athletics have the option of using other tracks.</li>
<li>In 4x100m, 4x200, relay race  the athlete are <b>not allowed</b> to choose any another track during race event.</li>
<li>Any indiscipline act during the event will lead to <b>disqualification</b>.</li>
</ul>
<span style="color:red;">* Athletics events will commence on 19/09/2017</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
 <div id="rules3" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>RULES</b></center></h3>
        </div>
        <div class="modal-body" id="rule"> <ul>
       <li> All the sets will be of <b>11 points</b> and the one who reaches first is the winner of the two.</li>
<li>All the games except the semifinals and the finals will be of <b>best of 3 sets</b> (11 points each).</li>
<li>Semifinals and Finals will be of best of <b>5 sets</b> (11 points each).</li>
<li>The Doubles and Mixed members need to be of the <b>same department</b> irrespective of year.</li>
<li>Any player caught under any code of misconduct will be <b>disqualified without any prior warning</b>.</li>
<li><b>Umpire’s Decision</b> will be the <b>final</b> decision.</li>
<li>Rest of the rules will be told at once (if any).</li>


        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
<div id="rules4" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>RULES</b></center></h3>
        </div>
        <div class="modal-body" id="rule"><ul>
        <li>Each team can have maximum of 12 players.</li>
<li>Teams are to be registered by their <b>respective captains</b>.</li>
<li>Rest of the rules are to be followed according to <b>FIBA</b>.</li> 
<li>The <b>captain</b> of team must <b>register first</b>, followed by their respective team members.</li>
<li>There must be only <b>one</b> team from each department.</li>
<li>Any in-disciplinary action may lead to <b>disqualification</b> of team and <b>faculty’s/APEX’s</b> decisions will be final.</li>
<li>No offline registration will be there hence everybody must <b>register online</b> with a team and their team captain.</li>
<li><b>Referee’s</b> decision will be final.</li>
<li>Minimum of <b>2 players</b> should be from each year.</li>


        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  

  
  <!--POOL-->

  <div id="rules5" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b><center><b>RULES</b></center></b></center></h3>
        </div>
        <div class="modal-body" id="rule"> <ul>
        <li>The game will start with a toss to decide the player to take the breaking shot.</li>
<li>In case the first ball potted is black then we will again start the game by having another breaking shot (this time by other).</li>
<li>The player potting a ball other than black ball in the breaking shot can choose which type of ball he/she will continue with.</li>
<li>Foul rules are not applicable while the table is open i.e. players have not decided their type of balls.</li>
<li>The player potting a ball after breaking shot while the table is open will own that type of ball.</li>
<li>The game will continue till a player loses/wins.</li>
<li>Mixed Doubles and Doubles members should be from the same department irrespective of year.</li>

        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!--//Volleyball-->
  <div id="rules6" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>RULES</b></center></h3>
        </div>
        <div class="modal-body" id="rule"> <ul>
        <li>Each team can have maximum of 12 players in their squad.</li>
<li>The teams are to be registered by their respective captains.</li>
<li>Minimum of 3 players from each year should be there in the squad.</li>
<li>All the matches till final will be of best of 3 sets, final match will be of 5 sets.</li>
<li>Last set of each match will be of 15 points.</li>
<li>Each team will be leaded by 4 th year captain.</li>
<li>In playing six 2 players from 4 th year is compulsory.</li>
<li>Rest of the rules will be told to team’s captains on field.</li>
<li>Delay of more than 15 minutes without any information will lead opposite team to victory.</li>
<li>No player without verification is allowed to play any match.</li>
<li>Any indisciplinary act during any match will result to disqualification of the respective team.</li>
<li>Refree’s and Apex decision will be last and to be followed.</li>

        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--Badminton-->
  <div id="rules7" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>RULES</b></center></h3>
        </div>
        <div class="modal-body" id="rule"><ul>
        <li>There are 3 events - Singles, Doubles and Mixed doubles.</li>
<li>Partners in Doubles and Mixed doubles event must be from same department.</li>
<li>There can be any number of entries for all the events.</li>
<li>Till Pre-quarter final all the matches will be of best of 1 (21 points). Further, all the matches will be of best of 3 (each set 21 points).</li>
<li>For Doubles and Mixed Doubles, all the matches will be of best of 3 (each set 21 points).</li>
<li>Any indisciplinary act during the match will result to disqualification of the player.</li>
<li>Referee's decision will be the last decision.</li>

        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div id="rules8" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>RULES</b></center></h3>
        </div>
        <div class="modal-body" id="rule"> <p><b>odfevnofudn</b></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!--//Football-->

  <div id="rules9" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>RULES</b></center></h3>
        </div>
        <div class="modal-body" id="rule"><ul>
      <li>  Every team can have maximum of 13 players (10+3) for boys and maximum of 9 players (6+3) for girls. </li>
<li>The teams are to be registered by their respective captains.</li>
<li>Each team must have atleast 3 players from each year.</li>
<li>The duration of the game will 20-5- 20(for boys) and 10-5- 10(for girls).</li>
<li>The jersey color should be be mentioned beforehand and should be strictly followed.</li>
<li>Shoes and shorts are compulsory.</li>
<li>The Referee’s decision is final and no argument should be done.</li>
<li>Else the player or team will be penalized as the referee will think right to do.</li>
<li>Any misconduct on the field can lead to disqualification of the team.</li>
<li>Other rules regarding the match will be told on the field.</li>
<li>The above rules are applicable on both girls and boys football team.</li>
<li>All players are to honor the game rules and play in healthy competition.</li>

        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--
//Cricket-->
  <div id="rules10" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>RULES</b></center></h3>
        </div>
        <div class="modal-body" id="rule"><ul>
         <li> Each team can have maximum of 15 players in their squad.</li>
<li>The teams are to be registered by their respective captains.</li>
<li>Minimum of 3 players from each year should be there in the squad.</li>
<li>The league matches will be of 10 overs each and further semifinals of 12 overs and final of 14 overs each.</li>
<li>Minimum of 4 bowlers have to be used in league matches and 5 bowlers in semifinals and final.</li>
<li>Rest of the rules will be told to the teams on the field.</li>
<li>Any indisciplinary act during the matches will result to disqualification of the respective team.</li>
<li>Umpires decision will be the last decision.</li>

        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div id="rules11" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center><b>RULES</b></center></h3>
        </div>
        <div class="modal-body" id="rule"><ul>
         <li> The event would comprise of Men’s Singles, Girl’s Singles, Men’s Doubles and Mixed Doubles of which all three are open events.</li>
 <li> In doubles both the players must belong to the same department. </li> 
<li>The chair umpire has final words on all issues related to on court facts.</li>
<li>The chair umpire has the duty to “overrule”  any clear mistake by a line umpire.</li>
<li>The decision of the Apex Coordinator will be final.</li>
<li>All the matches will be governed according to the rules of ITF.</li>
<li>Number of games and set will be decided by the coordinator according to the number of entries.</li>
<li>Balls will be provided for the matches only.</li>
 <li>Players are to report on their scheduled time failing to which they will be disqualified.</li>
<li>Any in disciplinary action would lead to disqualification of the respective player.</li>

        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</html>
