
   
 	
  $(document).ready(function() {
   
       var onoff=false;
 	
   $(".btn_all_menu").click(function() { //메뉴버튼 클릭시
       
       var documentHeight =  $(document).height();
       //실제 페이지의 높이 = $(document).height();
      
       $("#gnb").css('height',documentHeight);
       //반투명박스와 네비의 높이를 실제 페이지의 높이로 바꾸어라   

       if(onoff==false){
          $("#gnb").animate({right:0,opacity:1}, 'fast');
           onoff=true;
       }else{
           $("#gnb").animate({right:-1000,opacity:0}, 'slow');
           onoff=false;
       }
   });
   

    //2depth 메뉴 교대로 열기 처리 
    $('#gnb .depth1 h3>a').click(function(){
        $('#gnb .depth1 ul').hide();   //모든 서브를 닫아라
        $(this).parent('h3').next('ul').slideDown('slow');   //다음에오는 ul을 열어라
        $('#gnb .depth1 h3>a').css('background','#00aa54').css('color','#fff');
        $(this).css('background','#fff').css('color','#00aa54');
        
        
    });
   
    $('.btn_all_menu').click(function(e){
		e.preventDefault();
		if( $(this).hasClass('active') ){
		//	$('.allMenuWrap ').hide();
		
			$('.btn_all_menu').removeClass('active');
		}else{
		//	$('.allMenuWrap ').show();
		
			$('.btn_all_menu').addClass('active');
		}
	});
  });


  