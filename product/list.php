<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "product";
?>
<!DOCTYPE html>
<html lang="ko">
<head> 
 <title>신풍제약-제품검색</title>
<meta charset="utf-8">
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="../sub2/common/css/sub2common.css">
<link rel="stylesheet" href="../sub2/css/content2.css">
 <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
</head>
<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=9;			// 한 화면에 표시되는 글 수

    
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
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
	     <form class="search" name="board_form" method="post" action="list.php?mode=search"> 
		<div id="list_search">
	        <label class="hidden" for="find">상품명</label>
            <input type="hidden" id="find" name="find" value="subject">
			<div id="list_search2">검색어입력</div>
			<div id="list_search4"><input id="search" type="text" name="search" placeholder="상품명검색"></div>
			<div id="list_search5"><input type="image" src="../images/search.jpg" alt="검색"></div>
		</div>
		</form>
    
    
	
		
		

		<div class="clear"></div>

		

		<div class="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	  $item_about = str_replace(" ", "&nbsp;", $row[about]);
	  $item_kind = str_replace(" ", "&nbsp;", $row[kind]);
        
      if($row[file_copied_0]){ 
        $item_img = './data/'.$row[file_copied_0];  
      }else{
        $item_img = './data/default.jpg'  ;
      }
      
?>
			<div class="list_item">
				
				<div class="list_item2"><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
				
				<img src="<?=$item_img?>" alt="" width="180"
				 height="150">
				
				</a></div>
				<ul>
				<li class="list_item3"><a href="#"><?= $item_about ?></a></li>
				<li class="list_item4"><a href="#"><?= $item_subject ?></a></li>
				<li class="list_item5"><a href="#"><?= $item_kind ?></a></li>
	            </ul>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num">
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
            
          if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
          }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
            
          
		}      
   }
?>			
	
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>" title="목록"><i class="fas fa-history"></i></a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>" title="글쓰기"><i class="fas fa-pen-alt"></i></a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->

  
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="../common/js/gnb.js"></script>
    <script src="../common/js/top.js"></script>
    <script src="../common/js/family.js"></script>

  
    </article>
    <? include "../common/sub_foot.html" ?>
    <script src="https://kit.fontawesome.com/8f74c3df05.js" crossorigin="anonymous"></script>
</body>
    

</html>
