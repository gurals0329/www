<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>정보수정</title>
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../member/css/member_form.css" rel="stylesheet" type="text/css" media="all">
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	<script>
	 $(document).ready(function() {
  
   
 
 //id 중복검사
 $("#id").keyup(function() {    // id입력 상자에 id값 입력시
    var id = $('#id').val(); //aaa .val()== 스크립트 value값

    $.ajax({
        type: "POST",
        url: "check_id.php",
        data: "id="+ id,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext").html(data);
        }
    });
});
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
	
	
	
	</script>
<script>

	
	
	

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }


      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    //$userid='aaa';   로그인한 그 해당 인류의 아이디
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];  //000
    $hp2 = $hp[1];  //0000
    $hp3 = $hp[2];  //1111

    $email = explode("@", $row[email]);  //gurals0329@naver.com
    $email1 = $email[0];  //gurals0329
    $email2 = $email[1];  //naver.com

    mysql_close();
?>
<body>
<div id="wrap">

 <article id="content">  
      <header class="logo_b">
                       <h1>
                           <a href="../index.html">신풍제약</a>
                       </h1>
                   </header>
	  
	<h2>회원정보를 입력해주세요</h2>
	 
	  
	  <form  name="member_form" method="post" action="modify.php"> 
		
    <ul>
        <li class="id_for">
            <?= $row[id] ?>
			     <span id="loadtext"></span>
        </li>
        <li>
            <label for="pass" class="hidden">비밀번호</label>
             <input type="password" name="pass" id="pass" placeholder="비밀번호" required>
             
        </li>
        <li>
            <label for="pass_confirm" class="hidden">비밀번호확인</label>
            <input type="password" name="pass_confirm" id="pass_confirm" placeholder="비밀번호 확인" onkeyup="passCheck()" required>
            <span id="passtext"></span>
            <a href="#none" title="비밀번호 표시" id="eye"><i class="fas fa-eye"></i></a>
        </li>
        <li>
            <label for="name" class="hidden">이름</label>
            <?= $row[name] ?>
        </li>
        <li>
            <label for="nick" class="hidden">닉네임</label>
            <input type="text" name="nick" id="nick" placeholder="<?= $row[nick] ?>" required>
			     <span id="loadtext2"></span>
        </li>
        <li>
            <label for="hp1" class="hidden">전화번호</label>
     			<select class="hp" name="hp1" id="hp1"> 
              <option value='010'>010</option>
              <option value='011'>011</option>
              <option value='016'>016</option>
              <option value='017'>017</option>
              <option value='018'>018</option>
              <option value='019'>019</option>
          </select>  - 
          <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2" placeholder="<?= $hp2 ?>"  required> - <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3" placeholder="<?= $hp3 ?>"  required>
        </li>
        <li>
           <label for="email1" class="hidden">이메일</label>
     			<input type="text" id="email1" name="email1" placeholder="<?= $email1 ?>" required> @ 
     			<label class="hidden" for="email2">이메일주소</label>
     			<input type="text" name="email2" id="email2" placeholder="<?= $email2 ?>"  required> 
        </li>
        <li>
            
        </li>
    </ul>
    
    
    <div class="button">
   <a href="#" class="join_btn" onclick="check_input()">정보수정</a>&nbsp;&nbsp;
   <a href="#" class="reset_btn" onclick="reset_form()">다시쓰기</a>
    
    </div>
    

     

	 </form>
	  
	</article>
</div>
 <? include "../common/subfoot.html" ?>
</body>
</html>
