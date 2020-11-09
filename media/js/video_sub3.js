  $(document).ready(function() {
  	var screenSize = $(window).width();
		var screenHeight = $(window).height();
  	var current=false;
  	
		$("#content").css('margin-top',screenHeight);
		
  	if( screenSize > 1024){
        $("#videoBG").show();
        $("#imgBG").hide();
      }
    if(screenSize <= 1024){
        $("#videoBG").hide();
        $("#videoBG").attr('src','');
        $("#imgBG").show();
      }
  	
   $(window).resize(function(){    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
      screenSize = $(window).width(); 
      screenHeight = $(window).height();
		  
		  $("#content").css('margin-top',screenHeight);
		 
      if( screenSize > 1024 && current==false){
      	
        $("#videoBG").show();
        $("#videoBG").attr('src','images/sub3_full.jpg');
        $("#imgBG").hide();
        current=true;
      }
      if(screenSize <= 1024){
        $("#videoBG").hide();
        $("#videoBG").attr('src','');
        $("#imgBG").show();
        current=false;
      }
    }); 
		
		
		$('.down').click(function(){
            
              
			  screenHeight = $(window).height();
			  $('html,body').animate({'scrollTop':screenHeight}, 1000);
		});
		
		
  });