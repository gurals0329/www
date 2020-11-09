<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);       
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];
	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}
	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>보기</title>
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../greet/css/greet.css">
<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
<link rel="stylesheet" href="../sub6/css/content3.css">
 <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
<script>
	function check_input()
	{
		if (!document.ripple_form.ripple_content.value)
		{
			alert("내용을 입력하세요!");    
			document.ripple_form.ripple_content.focus();
			return;
		}
		document.ripple_form.submit();
    }

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
            <img src="../sub6/common/images/phone.jpg" alt="비주얼">
        </div>
        <!--서브네비영역 -->
        <div class="subnav_box">
            <h3>고객센터</h3>
            <p>신풍제약은 항상 고객의 소리에 귀 기울이겠습니다</p>
            <div class="subnav">
                <ul>
                    <li><a id="nav1" href="../sub6/sub6_1.html">고객지원센터</a></li>
                    <li><a class="current" id="nav2" href="../free/list.php">NEWS</a></li>
                    <li><a id="nav3" href="../greet/list.php">NOTICE</a></li>
                   
                </ul>
            </div> 
        </div>
      <article id="content">
            <div class="title_area">
               <div class="line_map">
                   <span>home</span> &gt;
                   <span>고객센터</span> &gt;
                   <strong>NEWS</strong>
               </div>
               <h2>NEWS</h2>
                <div class="clear_box"></div>
                
            
             </div>

	<div id="col2">        
	

		<div id="view_comment"> &nbsp;</div>
		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2">  
			                      <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
<?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

		<div id="ripple">
<?
	    $sql = "select * from free_ripple where parent='$item_num'";
	    $ripple_result = mysql_query($sql);

		while ($row_ripple = mysql_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num];
			$ripple_id      = $row_ripple[id];
			$ripple_nick    = $row_ripple[nick];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
?>
			<div id="ripple_writer_title">
			<ul>
			<li id="writer_title1"><?=$ripple_nick?></li>
			<li id="writer_title2"><?=$ripple_date?></li>
			<li id="writer_title3"> 
		      <? 
					if($userid=="admin" || $userid==$ripple_id)
			          echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>"; 
			  ?>
			</li>
			</ul>
			</div>
			<div id="ripple_content"><?=$ripple_content?></div>
			<div class="hor_line_ripple"></div>
<?
		}
?>			
			<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">  
			<div id="ripple_box">
				<div id="ripple_box1">댓글작성</div>
				<div id="ripple_box2"><textarea rows="5" cols="65" name="ripple_content"></textarea>
				</div>
				<div id="ripple_box3"><a href="#"><input type="submit" value="등록"></a></div>
			</div>
			</form>
		</div> <!-- end of ripple -->

		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>" title="목록"><i class="fas fa-history"></i></a>&nbsp;
<? 
	if($userid && ($userid==$item_id))
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>" title="수정"><i class="fas fa-remove-format"></i></a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')" title="삭제"><i class="fas fa-trash-alt"></i></a>&nbsp;
<?
	}
?>
<? 
	if($userid)
	{
?>
				<a href="write_form.php?table=<?=$table?>" title="글쓰기"><i class="fas fa-pen-alt"></i></a>
<?
	}
?>
		</div>
		<div class="clear"></div>

	</div> <!-- end of col2 -->
    </article> <!-- end of content -->
 <!-- end of wrap -->
  <? include "../common/sub_foot.html" ?>
  <script src="https://kit.fontawesome.com/8f74c3df05.js" crossorigin="anonymous"></script>
</body>

</html>