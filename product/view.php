<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    
    //$table=concert $num=1 $page=1
    
	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];
	$item_about     = $row[about];
	$item_kind     = $row[kind];

	$image_name[0]   = $row[file_name_0];  //첨부파일의 실제이름
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];  //날짜/시간으로 바뀐이름
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      =  $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
	
	for ($i=0; $i<3; $i++)  //첨부된이미지 처리를 위한 for문
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명) 
            // =>배열형태의 리턴값 
            
            // => 파일의 너비와 높이값, 종류
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

        if ($image_width[$i] > 785)  //첨부이미지의 최대너비
				$image_width[$i] = 785;
		}
		else //첨부된이미지가 없으면 모두 null값
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
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="../sub2/common/css/sub2common.css">
<link rel="stylesheet" href="../sub2/css/content2.css">
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
        <div class="visual">
            <img src="../sub2/common/images/medical.jpg" alt="">
        </div>
        <!--서브네비영역 -->
        <div class="subnav_box">
            <h3>제품정보</h3>
            <p>민족의 슬기와 긍지로 인류의 건강을 위하여</p>
            <div class="subnav">
                <ul>
                    <li><a id="nav1" href="../sub2/sub2_1.html">건강정보</a></li>
                    <li><a class="current" id="nav2" href="../product/list.php">제품검색</a></li>
                   
                </ul>
            </div> 
        </div>
      <article id="content">
              <div class="title_area">
               <div class="line_map">
                   <span>home</span> &gt;
                   <span>제품정보</span> &gt;
                   <strong>제품검색</strong>
               </div>
               <h2>제품검색</h2>
               <div class="clear_box"></div>
            </div>
	<div id="col2">
        
	

		<div id="view_comment"> &nbsp;</div>

		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"> 효능 : <?= $item_about ?><br> 코드 : <?= $item_kind ?> </div>	
		</div>

		<div id="view_content">
<?
	for ($i=0; $i<3; $i++)  //업로드된 이미지를 출력한다
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name; 
             // ./data/2019_03_22_10_07_15_0.jpg
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

		<div id="view_button">
					<a href="list.php?page=<?=$page?>" title="목록"><i class="fas fa-history"></i></a>&nbsp;
<? 
	if($userid==$item_id || $userid=="admin" || $userlevel==1 )
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
				<a href="write_form.php" title="글쓰기"><i class="fas fa-pen-alt"></i></a>
<?
	}
?>
		</div>

		<div class="clear"></div>

	</div> <!-- end of col2 -->
    </article>
<? include "../common/sub_foot.html" ?>
<script src="https://kit.fontawesome.com/8f74c3df05.js" crossorigin="anonymous"></script>
</body>

    
</html>
