    $(document).ready(function () {
        
    
         
         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
            

            $('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            
        
           
        
            
            
           
            
            
            //스크롤의 거리의 범위를 처리
            if(scroll>=500 && scroll<1000){    //***
                
                //첫번째 서브메뉴 활성화
                $('.content_area div:eq(0)').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이
            }else if(scroll>=1000 && scroll<1500){ //***
                
                //두번째 서브메뉴 활성화
                
                 $('.content_area div:eq(1)').addClass('boxMove2');
            }else if(scroll>=2000 && scroll<2500){    //***
                
                //세번째 서브메뉴 활성화
                
                 $('.content_area div:eq(2)').addClass('boxMove');
            }
            
             //스크롤의 거리의 범위를 처리
          }); 
        });


    