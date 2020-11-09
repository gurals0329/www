
$(document).ready(function() {
	$('.select').click(function(){
        //각각의 질문을 클릭하면
	var family =$('.select ul'); 
	   //클릭한 해당 질문의 리스트
        
	if(family.hasClass('aList')){ //클릭한 리스트의 답변이 닫혀있어?
	    $('.select .arrow').find('ul').slideUp(300); //모든답변을 닫아라
		family.removeClass('aList').addClass('on'); //전부 하이드.
        $('.select .arrow span').text('▲');
	 } else {  //클릭한 리스트의 답변이 열려있어? show
	   family.removeClass('on').addClass('aList');  
	   $('.select .arrow').find('ul').slideUp(300);
      $('.select .arrow span').text('▼');
	}  
  });    
});

