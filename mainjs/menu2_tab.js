     $(document).ready(function(){
      var cnt= $('.menu1 .tab').length  //탭메뉴개수  ***

      $('.contlist').show();
      $('.tab1').addClass('on');
      
     $('.menu1 .tab').click(function(){ 
         var ind=$(this).parent('li').index();  // 0 1 2 
         
         $('.tab').removeClass('on');
         $('.tab'+(ind+1)).addClass('on');
         //console.log(ind);
         if(ind==0){ 
             $('.menu2 ul:eq(0)').find('.left1').find('img').attr('src','images/med1.jpg');
             $('.menu2 ul:eq(0)').find('.left1').find('dt').text('신풍겐타마이신황산염');
             $('.menu2 ul:eq(0)').find('.left1').find('dd').html('<span>성분함량</span>파란옥시<br><span>보험코드</span>648502446<br><span>적응중</span>감염된 지루피부염');
             
             $('.menu2 ul:eq(0)').find('.right1').find('img').attr('src','images/med2.jpg');
             $('.menu2 ul:eq(0)').find('.right1').find('dt').text('에도날 캡슐');
             $('.menu2 ul:eq(0)').find('.right1').find('dd').html('<span>성분함량</span>파란옥시<br><span>보험코드</span>648502446<br><span>적응중</span>감염된 지루피부염');
             
             $('.menu2 ul:eq(1)').find('.left1').find('img').attr('src','images/med3.jpg');
             $('.menu2 ul:eq(1)').find('.left1').find('dt').text('세프라딘');
             $('.menu2 ul:eq(1)').find('.left1').find('dd').html('<span>성분함량</span>세파란옥시<br><span>보험코드</span>54832446<br><span>적응중</span>중이염');
             
             $('.menu2 ul:eq(1)').find('.right1').find('img').attr('src','images/med4.jpg');
             $('.menu2 ul:eq(1)').find('.right1').find('dt').text('레포신 정');
             $('.menu2 ul:eq(1)').find('.right1').find('dd').html('<span>성분함량</span> 레보플록사신<br><span>보험코드</span>44645730<br><span>적응중</span>눈꺼풀염');
             
             $('.menu2 ul:eq(2)').find('.left1').find('img').attr('src','images/med2.jpg');
             $('.menu2 ul:eq(2)').find('.left1').find('dt').text('오엑스피');
             $('.menu2 ul:eq(2)').find('.left1').find('dd').html('<span>성분함량</span>옥살리플라틴<br><span>보험코드</span>246507946<br><span>적응중</span> 전이성 위암');
             
             $('.menu2 ul:eq(2)').find('.right1').find('img').attr('src','images/med6.jpg');
             $('.menu2 ul:eq(2)').find('.right1').find('dt').text('파캔서주');
             $('.menu2 ul:eq(2)').find('.right1').find('dd').html('<span>성분함량</span>도세탁셀삼수<br><span>보험코드</span>975515730<br><span>적응중</span>만성 전립샘암');
         }else if(ind==1){
             $('.menu2 ul:eq(0)').find('.left1').find('img').attr('src','images/med7.jpg');
             $('.menu2 ul:eq(0)').find('.left1').find('dt').text('칸세틸');
             $('.menu2 ul:eq(0)').find('.left1').find('dd').html('<span>성분함량</span>에르도스테인<br><span>보험코드</span>9485646<br><span>적응중</span>발기부전');
             
             $('.menu2 ul:eq(0)').find('.right1').find('img').attr('src','images/med8.jpg');
             $('.menu2 ul:eq(0)').find('.right1').find('dt').text('바로코민골드정');
             $('.menu2 ul:eq(0)').find('.right1').find('dd').html('<span>성분함량</span>리보플라빈<br><span>보험코드</span>VDT 100<br><span>적응중</span>육체피로');
             
             $('.menu2 ul:eq(1)').find('.left1').find('img').attr('src','images/med9.jpg');
             $('.menu2 ul:eq(1)').find('.left1').find('dt').text('에제로수정');
             $('.menu2 ul:eq(1)').find('.left1').find('dd').html('<span>성분함량</span>로수바스타틴칼슘<br><span>보험코드</span>648507560<br><span>적응중</span>콜레스테롤혈증');
             
             $('.menu2 ul:eq(1)').find('.right1').find('img').attr('src','images/med10.jpg');
             $('.menu2 ul:eq(1)').find('.right1').find('dt').text('칸데암로정');
             $('.menu2 ul:eq(1)').find('.right1').find('dd').html('<span>성분함량</span>칸데사르탄실렉세틸<br><span>보험코드</span>648507590<br><span>적응중</span>고혈압');
             
             $('.menu2 ul:eq(2)').find('.left1').find('img').attr('src','images/med11.jpg');
             $('.menu2 ul:eq(2)').find('.left1').find('dt').text('바로페질정');
             $('.menu2 ul:eq(2)').find('.left1').find('dd').html('<span>성분함량</span>염산염수화물<br><span>보험코드</span>48212946<br><span>적응중</span>치매증상의 치료');
             
             $('.menu2 ul:eq(2)').find('.right1').find('img').attr('src','images/med12.jpg');
             $('.menu2 ul:eq(2)').find('.right1').find('dt').text('아가브론시럽');
             $('.menu2 ul:eq(2)').find('.right1').find('dd').html('<span>성분함량</span>에탄올추출물<br><span>보험코드</span>648506691<br><span>적응중</span>급성 기관지염');
         }else if(ind==2){
             $('.menu2 ul:eq(0)').find('.left1').find('img').attr('src','images/med13.jpg');
             $('.menu2 ul:eq(0)').find('.left1').find('dt').text('카젠정');
             $('.menu2 ul:eq(0)').find('.left1').find('dd').html('<span>성분함량</span>칼리디노게나제<br><span>보험코드</span>648507250<br><span>적응중</span>갱년기장애');
             
             $('.menu2 ul:eq(0)').find('.right1').find('img').attr('src','images/med14.jpg');
             $('.menu2 ul:eq(0)').find('.right1').find('dt').text('알츠코린정');
             $('.menu2 ul:eq(0)').find('.right1').find('dd').html('<span>성분함량</span>성분 콜린알포<br><span>보험코드</span>648507770<br><span>적응중</span>정서불안');
             
             $('.menu2 ul:eq(1)').find('.left1').find('img').attr('src','images/med15.jpg');
             $('.menu2 ul:eq(1)').find('.left1').find('dt').text('바로코민정');
             $('.menu2 ul:eq(1)').find('.left1').find('dd').html('<span>성분함량</span>푸르설티아민<br><span>보험코드</span>코드 VRT 100<br><span>적응중</span>신경통, 근육통');
             
             $('.menu2 ul:eq(1)').find('.right1').find('img').attr('src','images/med17.jpg');
             $('.menu2 ul:eq(1)').find('.right1').find('dt').text('헬티스에프');
             $('.menu2 ul:eq(1)').find('.right1').find('dd').html('<span>성분함량</span>리소짐염산염<br><span>보험코드</span>HTC 120(231)<br><span>적응중</span>치은염');
             
             $('.menu2 ul:eq(2)').find('.left1').find('img').attr('src','images/med1.jpg');
             $('.menu2 ul:eq(2)').find('.left1').find('dt').text('알파칼시돌');
             $('.menu2 ul:eq(2)').find('.left1').find('dd').html('<span>성분함량</span> 레알칼시돌<br><span>보험코드</span>코드RAC 090<br><span>적응중</span>골다공증');
             
             $('.menu2 ul:eq(2)').find('.right1').find('img').attr('src','images/med6.jpg');
             $('.menu2 ul:eq(2)').find('.right1').find('dt').text('파캔서주');
             $('.menu2 ul:eq(2)').find('.right1').find('dd').html('<span>성분함량</span>도세탁셀삼수<br><span>보험코드</span>975515730<br><span>적응중</span>만성 전립샘암');
         }
         
         
     });
         
         
    
    });
