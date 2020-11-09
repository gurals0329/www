var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.

 xhr.onload = function() {                       // When readystate changes
 
  //if(xhr.status === 200) {                      // If server status was ok
    responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
	                                               

    var newContent = '';
    
    newContent+='<h3>재무상태표</h3>';
    newContent+='<table>';
    newContent+='<thead><tr><th scope="col">구분</th><th scope="col">2019</th><th scope="col">2018</th><th scope="col">2017</th></tr></thead>';
    newContent+='<tbody>'
    for (var i = 0; i < responseObject.total.length; i++) { 
      newContent += '<tr>';
      newContent += '<th scope="row" class="lefteng">' + responseObject.total[i].gubun + '</th>';
      newContent += '<td class="righteng">' + responseObject.total[i].first + '</td>';
      newContent += '<td class="righteng">' + responseObject.total[i].second + '</td>';
      newContent += '<td class="righteng">' + responseObject.total[i].third + '</td>';   
      newContent += '</tr>';
        
    }
    newContent += '</tbody>';
    newContent += '</table>';
 
    document.getElementById('table1').innerHTML = newContent;

  //}
};

xhr.open('GET','data/table.json', true);        // 요청을 준비한다.
xhr.send(null);                                 // 요청을 전송한다

