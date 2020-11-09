$(document).ready(function () {
	     var timeonoff;  // 타이머
         var pcnt=1;  // 카운터=순서
		 var totalcnt=3; // 총 개수   ****
		 
	 $('.contlist .arrow02').click(function () {
		 pcnt++;  // 카운터를 1씩 증가
		 if(pcnt>totalcnt){  //카운터가 4가되면
		    pcnt=1;  //카운터를 1로 바꾼다
		 }
		 
		 
	     //clearInterval(timeonoff );	
         $('.menu2 .left_menu').first().appendTo('.product .menu2');
         });


         $('.contlist .arrow01').click(function () {
		   pcnt--;	 //카운트 1씩 감소
		   if(pcnt<1){  //1보다 작아지면
		    pcnt=totalcnt;  //3으로 바꾼다 총개수..
		   }
		
		
			 
	     //clearInterval(timeonoff );	
             $('.menu2 .left_menu').last().prependTo('.product .menu2');  //prependTo 가장 위로 보낸다
         });
    
    
        /*  timeonoff =  setInterval(function () { 
			  pcnt++;
		     if(pcnt>totalcnt){
		         pcnt=1;
		      }
		      
		      $('.menu2 .left_menu').first().appendTo('.product .menu2'); // 첫번째 ul 의 첫번째 ul (appendTo 가장 밑으로)
			   
            }, 500);*/
      });
       
