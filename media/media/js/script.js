$(document).ready(function(){
    
     const smh=$('.videoBox').height()-$('#headerArea').height();
    const on_off=false;  
    
    
       $(window).bind('scroll',function(){
            var scroll = $(window).scrollTop();
       

            if(scroll>smh-100){
                $('#headerArea').css('background','rgba(0,0,0,.9)');
                
                
            }else{
                if(on_off===false){
                    $('#headerArea').css('background','rgba(0,0,0,0)');
                    $('#gnb ul li a').css('color','#fff');
                }
            }; 
            
         });
  
       $(this).siblings('li').removeClass('current');

       
    
    
     $('.select li:eq(0)').find('img').css('filter','grayscale(100%)');
    $('.select a').click(function(){
        $('.current img').hide();
        $('.current img').fadeIn('slow');
		var ind = $(this).parent('li').index();
		var chr='';		
		
        $('.select img').css('filter','grayscale(0%)');
        $(this).find('img').css('filter','grayscale(100%)');
		if(ind==0){
              $('.current img').attr('src','images/slice_pc09_1.jpg'); 
            $('.other01').text('JESSIE');
           
        
             
            
              
         }else if(ind==1){
              $('.current img').attr('src','images/slice_pc09_2.jpg'); 
            $('.other01').text('BOPPIP');
             
             
            
            
             
         }else if(ind==2){
              $('.current img').attr('src','images/slice_pc09_3.jpg'); 
             $('.other01').text('POTATO');
             
        
             
              
         }else if(ind==3){
            $('.current img').attr('src','images/slice_pc09_4.jpg');   
             $('.other01').text('POTATO');
             
        
         }
        
	});
	
    $('.years a').click(function(){
        $('.product img').hide();
        $('.product img').fadeIn('slow');
		var ind = $(this).parent('li').index();
		var chr='';		
		
		if(ind==0){
              $('.product img').attr('src','images/slice_pc02_1.jpg'); 
            $('.count .one p').text('1995');
            $('.count .two p').text('1995 nyeon wolteu dijeuni keompeoniga baegeubhago pigsaga jejag han.');
            
            
             
             // chr='<p>Joy</p>';
            //  chr+='<p>Joy’s goal has always been to make sure Riley stays happy.</p>';              
            // $('.char_con .txt').html(chr);
              
         }else if(ind==1){
              $('.product img').attr('src','images/slice_pc02_2.jpg'); 
            $('.count .one p').text('1997');
             $('.count .two p').text('1999 nyeon-e pigsa-eseo balpyo han toi seutoliui sogpyeon-ida.');
             
            
             
         }else if(ind==2){
              $('.product img').attr('src','images/slice_pc02_3.jpg'); 
             $('.count .one p').text('2010');
             $('.count .two p').text('2010 nyeon 6 wol-e gaebong han toi seutoli silijeuui 3 beonjjae jagpum-ida. ');
             
              
         }else if(ind==3){
            $('.product img').attr('src','images/slice_pc02_4.jpg');   
            $('.count .one p').text('2019');
             $('.count .two p').text('jim moliseu pigsa daepyoui seolmyeong-e ttaleumyeon ijeon 3');
         }
	});
    
    $('.topMove').click(function(){
                 $("html,body").stop().animate({"scrollTop":0},1000); 
     }); 
    
   
   
    var screenHeight = $(window).height();
    
    $('.ham_btn').toggle(function(){
       $('#gnb ul').show();
        $('.ham_btn').addClass('open');
        
    },function(){
       $('#gnb ul').hide();
        $('.ham_btn').removeClass('open');
    });
    
        
    var current=0;
    
    $(window).resize(function(){
       var screenSize= $(window).width(); 
        
        if( screenSize > 1024){
            $('#gnb ul').show();
            $('.ham_btn').removeClass('open');
             current=1;
        }
        if(current==1 && screenSize <= 1024){
            $('#gnb ul').hide();
            current=0;
        }
    });
    

    
});


       
    
    