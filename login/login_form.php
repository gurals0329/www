<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="css/member.css" rel="stylesheet" type="text/css" media="all">
<script src="https://kit.fontawesome.com/8f74c3df05.js" crossorigin="anonymous"></script>

</head>

<body>
<div id="wrap">
  
   <div id="content">
    <div class="back">
      <img src="../images/log_full.jpg" alt="배경이미지">
  </div>
     <h2 class="hidden">로그인페이지</h2>
      
        
         <div class="login_wrap">
             <form  name="member_form" method="post" action="login.php">
                  <!-- end of form_login --> 
                
                <div class="login_form">
                     <h3>LOGIN</h3>
                     <div class="input_box">
                        <ul>
                            <li>
                                <label class="hidden" for="id">아이디</label>
                                <input type="text" name="id" id="id" class="login_input" placeholder="아이디를 입력해주세요">
                            </li>
                            <li>
                                <label class="hidden" for="pass">패스워드</label>   
                                <input type="password" name="pass" id="pass" class="pass_input" placeholder="패스워드를 입력해주세요">
                            </li>
                        </ul>						
                     </div>
                     <ul class="buttons">
                         <li class="login_button">
                             <input type="submit" value="로그인"> 
                         </li>
                         <li class="join_btn">
                        <div class="join_button">
                        <p>▶ 아직 회원이 아니십니까?
                        <a href="../member/join.html">회원가입하기</a></p>
                        </div>
                         </li>
                         <li class="find_btn">
                             <a href="../idfind/idfind_form.php"><i class="fas fa-unlock-alt"></i><br>아이디찾기</a>
                             <a href="../idfind/passfind_form.php"><i class="fas fa-key"></i><br>비밀번호찾기</a>
                         </li>
                     </ul>
                 </div>
             </form>
         </div>
         <a href="../index.html" class="close" onclick="join_cancel()"><i class="fas fa-times"></i></a>
      </div>
</div> <!-- end of wrap -->
    

<script src="https://kit.fontawesome.com/8f74c3df05.js" crossorigin="anonymous"></script>
</body>

</html>