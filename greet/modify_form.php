<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
   //세션변수 4
    //num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>수정</title>
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../greet/css/greet.css">
<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
<link rel="stylesheet" href="../sub6/css/content3.css">
 <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
</head>

<body>
<? include "../common/sub_head.html" ?>
        <!-- 메인비주얼영역 -->
        <div class="visual">
            <img src="../sub6/common/images/phone.jpg" alt="">
        </div>
        <!--서브네비영역 -->
        <div class="subnav_box">
            <h3>고객센터</h3>
            <p>신풍제약은 항상 고객의 소리에 귀 기울이겠습니다</p>
            <div class="subnav">
                <ul>
                    <li><a id="nav1" href="../sub6/sub6_1.html">고객지원센터</a></li>
                    <li><a id="nav2" href="../free/list.php">NEWS</a></li>
                    <li><a class="current" id="nav3" href="../greet/list.php">NOTICE</a></li>
                   
                </ul>
            </div> 
        </div>
      <article id="content">
            <div class="title_area">
               <div class="line_map">
                   <span>home</span> &gt;
                   <span>고객센터</span> &gt;
                   <strong>NOTICE</strong>
               </div>
               <h2>NOTICE</h2>
                <div class="clear_box"></div>
                
            
             </div>

	<div id="col2">        
	<div class="contents_area">

		<div class="clear"></div>

		<div id="write_form_title">
			게시글 수정
		</div>
    
		<div class="clear"></div>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1"> 닉네임 </div>
				<div class="col2"><?=$usernick?></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button"><input type="submit">&nbsp;
								<a href="list.php?page=<?=$page?>"><i class="fas fa-history"></i></a>
		</div>
		</form>

	</div>
	</div> <!-- end of col2 -->
  </article> <!-- end of content -->
<!-- end of wrap -->
      <? include "../common/sub_foot.html" ?>
      <script src="https://kit.fontawesome.com/8f74c3df05.js" crossorigin="anonymous"></script>
</body>

</html>