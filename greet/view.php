<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
    if ($is_html!="y")
	{
		$item_content = str_replace("&lt;", "<", $item_content);
		$item_content = str_replace("&gt;", ">", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>목록</title>
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../greet/css/greet.css">
<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
<link rel="stylesheet" href="../sub6/css/content3.css">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
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
  
  <div id="content">
<div class="title_area">
               <div class="line_map">
                   <span>home</span> &gt;
                   <span>고객센터</span> &gt;
                   <strong>NOTICE</strong>
               </div>
               <h2>NOTICE</h2>
                <div class="clear_box"></div>
                
            
             </div>

	<div id="col2" class="view">
        
    <div class="content_area">

		<div id="view_comment"> &nbsp;</div>

		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?>  
			                      | <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?page=<?=$page?>" title="목록"><i class="fas fa-history"></i></a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	{
?>
				<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>" title="수정"><i class="fas fa-remove-format"></i></a>&nbsp;
				<a href="javascript:del('delete.php?num=<?=$num?>')" title="삭제"><i class="fas fa-trash-alt"></i></a>&nbsp;
<?
	}
?>
<? 
	if($userid )  //로인인이 되면 글쓰기
	{
?>
				<a href="write_form.php" title="글쓰기"><i class="fas fa-pen-alt"></i></a>
<?
	}
?>
		</div>

		<div class="clear"></div>

	</div> <!-- end of col2 -->
	</div>
  </div> <!-- end of content -->
  <? include "../common/sub_foot.html" ?>
  <script src="https://kit.fontawesome.com/8f74c3df05.js" crossorigin="anonymous"></script>
</body>

</html>
