@extends('guru/layouts/master')
  @section('judul', 'kalender')
  @section('content')
  <div class="container">
                <div id="content" class="background-siswa">
                <div style="position: absolute; margin-left: -130px; margin-top: 15px;" class="row">
                  <div class="col">
                   <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="glyphicon glyphicon-align-left fa fa-bars fa-2x"></i>
                        <!-- <img src="img/menu_toggle.png" alt=""> -->
                    </button>
                    </div>
                  </div>
                   <!-- search box -->

                    <div class="row">
        <div class="col-1">
          <h2 style="color : white; ">Home</h2>
        </div>
        <div class="col-1 ml-4">
          <img id="icon-home" src="{{ asset('siswa/img/home_icon.png') }}">
        </div>
        <div class="col ml-4">
          <span><p style="padding-top: 22px; font-size: 12px;">&nbsp;&nbsp; &nbsp;Home &nbsp; - &nbsp; Tugas</p></span>
        </div>
        <div class="col">
          <div class="btn-group float-right" style="margin-top: 10px;">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ $user }}
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ url('guru/profil')}}">Profile</a>
              <a class="dropdown-item" href="{{ url('logout')}}">Logout</a>
            </div>
          </div>
        </div>
      </div>
                    <!-- content dasboard -->
                    <?php
                    function draw_calendar($month,$year){

                    	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

                    	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
                    	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

                    	$running_day = date('w',mktime(0,0,0,$month,1,$year));
                    	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
                    	$days_in_this_week = 1;
                    	$day_counter = 0;
                    	$dates_array = array();

                    	$calendar.= '<tr class="calendar-row">';

                    	for($x = 0; $x < $running_day; $x++):
                    		$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
                    		$days_in_this_week++;
                    	endfor;

                    	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
                    		if($list_day==date('d') && $month==date('n'))
                    		{
                    			$currentday='currentday';
                    		}else
                    		{
                    			$currentday='';
                    		}
                    		$calendar.= '<td class="calendar-day '.$currentday.'">';

                    			if($list_day<date('d') && $month==date('n'))
                    			{
                    				$showtoday='<strong class="overday">'.$list_day.'</strong>';
                    			}else
                    			{
                    				$showtoday=$list_day;
                    			}
                    			$calendar.= '<div class="day-number">'.$showtoday.'</div>';

                    		$calendar.= '</td>';
                    		if($running_day == 6):
                    			$calendar.= '</tr>';
                    			if(($day_counter+1) != $days_in_month):
                    				$calendar.= '<tr class="calendar-row">';
                    			endif;
                    			$running_day = -1;
                    			$days_in_this_week = 0;
                    		endif;
                    		$days_in_this_week++; $running_day++; $day_counter++;
                    	endfor;

                    	if($days_in_this_week < 8):
                    		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
                    			$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
                    		endfor;
                    	endif;

                    	$calendar.= '</tr>';

                    	$calendar.= '</table>';

                    	return $calendar;
                    }
                    ?>


                    	<style>

                    		@charset "utf-8";
                    		/* CSS Document */
                    		html,body,form{ margin:0px; padding:0px; font-family:Ebrima, Arial, Helvetica, sans-serif; font-size:12px; color:#666; empty-cells:hide;}
                    		table.calendar{border-style: solid; border-width: 1px; border-width:1px; border-color:#666; -moz-box-shadow:0px 0px 4px #CCCCCC; -webkit-box-shadow:0px 0px 4px #CCCCCC; box-shadow:0px 0px 4px #CCCCCC; }
                    		tr.calendar-row  {  }
                    		td.calendar-day  { min-height:80px; position:relative; } * html div.calendar-day { height:80px; }
                    		td.calendar-day:hover  { background:#FFF; -moz-box-shadow:0px 0px 20px #eeeeee inset; -webkit-box-shadow:0px 0px 20px #eeeeee inset; box-shadow:0px 0px 20px #eeeeee inset; cursor:pointer;}
                    		td.calendar-day-np  { background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
                    		td.calendar-day-head {font-weight:bold; text-shadow:0px 1px 0px #FFF;color:#666; text-align:center; width:64px; padding:12px 6px; border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC; background: #ffffff;
                    		background: -moz-linear-gradient(top,  #ffffff 0%, #ededed 100%);
                    		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#ededed));
                    		background: -webkit-linear-gradient(top,  #ffffff 0%,#ededed 100%);
                    		background: -o-linear-gradient(top,  #ffffff 0%,#ededed 100%);
                    		background: -ms-linear-gradient(top,  #ffffff 0%,#ededed 100%);
                    		background: linear-gradient(to bottom,  #ffffff 0%,#ededed 100%);
                    		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
                    		}
                    		div.day-number{padding:6px; text-align:center; }
                    		/* shared */
                    		td.calendar-day, td.calendar-day-np {padding:5px; border-bottom:1px solid #DBDBDB; border-right:1px solid #DBDBDB; font-size:14px;background: #ffffff;
                    		background: -moz-linear-gradient(top,  #ffffff 0%, #f2f2f2 100%);
                    		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#f2f2f2));
                    		background: -webkit-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
                    		background: -o-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
                    		background: -ms-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
                    		background: linear-gradient(to bottom,  #ffffff 0%,#f2f2f2 100%);
                    		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f2f2f2',GradientType=0 );
                    		}


                    		.overday{ color:#164b87; text-shadow:0px 1px 0px #FFF;}
                    		.currentday{background: #6cb7f3 !important;
                    		background: -moz-linear-gradient(top,  #6cb7f3 0%, #388be8 100%) !important;
                    		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#6cb7f3), color-stop(100%,#388be8)) !important;
                    		background: -webkit-linear-gradient(top,  #6cb7f3 0%,#388be8 100%) !important;
                    		background: -o-linear-gradient(top,  #6cb7f3 0%,#388be8 100%) !important;
                    		background: -ms-linear-gradient(top,  #6cb7f3 0%,#388be8 100%) !important;
                    		background: linear-gradient(to bottom,  #6cb7f3 0%,#388be8 100%) !important;
                    		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6cb7f3', endColorstr='#388be8',GradientType=0 ) !important; color:#FFF  !important; font-weight:bold; -moz-box-shadow:0px 0px 18px #1F68BA inset; -webkit-box-shadow:0px 0px 18px #1F68BA inset; box-shadow:0px 0px 18px #1F68BA inset;
                    		}
                    		.currentday:hover{-moz-box-shadow:0px 0px 24px #074080 inset !important; -webkit-box-shadow:0px 0px 24px #074080 inset !important; box-shadow:0px 0px 24px #074080 inset !important;}

                    </style>

                      <?php
                      date_default_timezone_set('Asia/Jakarta');
                      $date = date('F Y', strtotime('20200715'));
                      ?>
                      <br>
                      <h1>{{$date}}</h1>
                      <br>
                        <?php
                        echo draw_calendar(7,2013);
                        ?>
                </div>
              </div>
  @endsection
