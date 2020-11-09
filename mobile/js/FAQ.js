// JavaScript Document

$(document).ready(function(){
  var cnt= $('.tabs .tab').length  //탭메뉴개수  ***
  
  $('.content_area .contlist:eq(0)').show(); //첫번째 내용만 보여라
  $('.tabs .tab1').addClass('on');
  
  $('.tabs .tab').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.content_area .contlist').hide(); // 모든 탭내용을 안보이게 한다
	  $('.content_area .contlist:eq('+index+')').show();
	  for(var i=1;i<=cnt;i++){
      $('.tab'+i).removeClass('on');
          
      }  //모든 탭메뉴 비활성화
      $(this).addClass('on'); 
   });
  });
});
// JavaScript Document

 $(document).ready(function () {
	var article = $('.faq .article'); //모든 리스트들
	//article.find('.a').slideUp(100); //모든 답변 닫아라
	
	$('.faq .article .trigger').click(function(){
        //각각의 질문을 클릭하면
	var myArticle = $(this).parents('.article'); 
	   //클릭한 해당 질문의 리스트
        
	if(myArticle.hasClass('hide')){ //클릭한 리스트의 답변이 닫혀있어?
	    article.find('.a').slideUp(300); //모든답변을 닫아라
		article.removeClass('show').addClass('hide'); //전부 하이드.
        article.find('span').css('transform','rotate(360deg)');
	    myArticle.removeClass('hide').addClass('show');  
	    myArticle.find('.a').slideDown(300);
        myArticle.find('span').css('transform','rotate(180deg)');
        article.find('.a');
	 } else {  //클릭한 리스트의 답변이 열려있어? show
	   myArticle.removeClass('show').addClass('hide');  
	   myArticle.find('.a').slideUp(300);
       myArticle.find('span').css('transform','rotate(360deg)');
	}  
  });    
	

});  
