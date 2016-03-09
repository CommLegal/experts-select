<?php 

//START - TURN ERRORS ON
/*ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);*/
//END - TURN ERRORS ON

//var_dump($_POST);

class Calendar {  
     
    /**
     * Constructor
     */
	 
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
     
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
	
    public function show($dateFrom, $dateTo, $lat, $long, $radius, $newMonth) {
        $year  = null;
         
        $month = null;
		
		$GLOBALS['datefrom'] = $dateFrom;
		
		$GLOBALS['dateto'] = $dateTo;
		
		$GLOBALS['latitude'] = $lat;
		
		$GLOBALS['longitude'] = $long;
		
		$GLOBALS['radius'] = $radius;
		
		$GLOBALS['month'] = $newMonth;
         
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
         
        $this->currentYear=$year;
         
		 
		 //MONTH CHANGES HERE BUT DOES NOT CHECK DAYS IF +0 HAS NO EFFECT
		 
        $newMonth=$month;
		
		if($GLOBALS['month'] == NULL) { 
		
			$this->currentMonth = $newMonth;
			
		}else { 
		
			$this->currentMonth = $GLOBALS['month'];
		
		}
		
		
		//$GLOBALS['thisMonth'] = $this->currentMonth;
		 
		 //CHANGES THE DAYS IN MONTH HERE
        $this->daysInMonth=$this->_daysInMonth($this->currentMonth,$year);  
		
		
		
         
        $content='<div id="calendar">'.
					'<form method="post" id="calenderForm">'.
						'<input type="hidden" name="cLat" value="'.$GLOBALS['latitude'].'" />'.
						'<input type="hidden" name="cLong" value="'.$GLOBALS['longitude'].'" />'.
						'<input type="hidden" name="cRadius" value="'.$GLOBALS['radius'].'" />'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</form></div>';
        return $content;   
		
    }
     
    /********************* PRIVATE **********************/ 
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){
		
		global $conn;
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
				
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
			
			if($GLOBALS['month'] == NULL) {
             
            	$this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
				
			} else { 
			
				$this->currentDate = date('Y-' . $GLOBALS['month'] . '-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
				
				//echo $this->currentDate;
				
			}
             
            $cellContent = $this->currentDay;
			
			echo '<div id="success"></div>';
			
			$endDate =  substr($this->currentDate, 0, 11);
			
			$result = $conn->execute_sql('select',
		
				array("count(*) as rows"), 
				'e_appointments AS z
				
				JOIN ( 
				
				SELECT ' . $GLOBALS['latitude'] . ' AS latpoint, ' . $GLOBALS['longitude'] . ' AS longpoint,
				' . $GLOBALS['radius'] . ' AS radius, 111.045 AS distance_unit
				) AS p ON 1=1',
				
				'z.eap_v_lat
				BETWEEN p.latpoint - (p.radius / p.distance_unit)
				AND p.latpoint + (p.radius / p.distance_unit)
				AND z.eap_v_long
				BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
				AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
				AND ((p.distance_unit
				* DEGREES(ACOS(COS(RADIANS(p.latpoint))
				* COS(RADIANS(z.eap_v_lat))
				* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
				+ SIN(RADIANS(p.latpoint))
				* SIN(RADIANS(z.eap_v_lat))))) * 0.621371) <= p.radius
				AND eap_booked IS NULL AND eap_date >=? AND eap_date <=? AND eap_cc_id =? ORDER BY eap_date', array("s1" => $this->currentDate . " 00:00:00", "s2" => $endDate . " 23:59:59", "i" => "0"));
             
            $this->currentDay++;   
			
			var_dump($result);
			
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }
		
		if(($this->currentDate >= $GLOBALS['datefrom']) &&  ($this->currentDate <= $GLOBALS['dateto'])) {
			
			
		

			return '<li id="test" value="'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'"><a class="calendarDate" name="calendarDate" requestID="'.$this->currentDate.'" href="#"><b>'.$cellContent.'</b></a><small>'. " /<u>" . $result[0]['rows'].'</u></small></li>';
		} else { 
			return '<li id="'.$this->currentDate.'" value="'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
		}
			 
    }
     
    /**
    * create navigation
    */
	
    private function _createNavi(){
		
		//$thisMonth = $this->currentMonth==12?1:intval($this->currentMonth);
		
		$thisMonth = $this->currentMonth==12?0:intval($this->currentMonth);
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
		
		$currentYM = $preYear. "-" . sprintf('%02d',$thisMonth);	
		
		$date = new DateTime($currentYM);
		$date->add(new DateInterval('P1M'));
		$addMonth = $date->format('m');
		
		$date = new DateTime($currentYM);
		$date->sub(new DateInterval('P1M'));
		$subMonth = $date->format('m');
		
		echo $currentYM;
		
		if($subMonth == "12") { 
		
			return
            '<div class="header">'.
                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                '<a class="next" id="next" name="next" value="'.$addMonth.'" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
            '</div>';
		
		}elseif($addMonth == "01") {
         
			return
				'<div class="header">'.
					'<a class="prev" id="prev" name="prev" value="'.$subMonth.'" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a> '.
						'<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
				'</div>';
				
		} else {
		
			return
				'<div class="header">'.
					'<a class="prev" id="prev" name="prev" value="'.$subMonth.'" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a> '.
						'<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
					'<a class="next" id="next" name="next" value="'.$addMonth.'" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
				'</div>';
		
		}
    }
         
    /**
    * create calendar week labels
    */
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
 
        }
         
        return $content;
		
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
	
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
     
}

?>

<script>	

	$('.calendarDate').click(function(e){
		e.preventDefault();	
		
		var data = $("#calenderForm").serializeArray();
		data.push({name: 'calendarDate', value: $(this).attr("requestID")});

		$.post( 'includes/mro/list-appointments.php', data, 
			 {
				requestID: $(this).attr("requestID")
			})
			.done(function( data ) {	 
			 	$("#appointmentTime").html(data);
			});
	});
	
	$('#next').click(function(e){
		e.preventDefault();
		$('#calendar').hide();
		$('#loading').fadeIn();
		var month = $("#next").attr("value");
		$.post(
		   'includes/mro/book-app-search2.php',
			{value: month},
			function(month){				
				$("#success").html(month);			
			}	
		  );
	});
	
	$('#prev').click(function(e){
		e.preventDefault();
		$('#calendar').hide();	
		$('#loading').fadeIn();
		var month = $("#prev").attr("value");
		$.post(
		   'includes/mro/book-app-search2.php',
			{value: month},
			function(month){				
				$("#success").html(month);
			}	
		  );
	});
	

	
</script>