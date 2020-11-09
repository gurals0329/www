$(document).ready(function(){
 
  $('.right .video').click(function(){  
      var ind = $(this).index();  // 0 1 2 3 4 5
      var ch = $('.video'+(ind+1)).find('p').html();
        
      console.log(ind + '  '+ ch);
	  $('.left .info').html(ch);
      
   });
});

