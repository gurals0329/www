<? 
	session_start(); 
     @extract($_POST);
     @extract($_GET);
     @extract($_SESSION);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>리스트</title>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
 <script src="https://kit.fontawesome.com/8f74c3df05.js" crossorigin="anonymous"></script>
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../greet/css/greet.css">
<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
<link rel="stylesheet" href="../sub6/css/content3.css">

</head>

<?
	include "../lib/dbconn.php";

	
  if (!$scale)
    $scale=5;			// 한 화면에 표시되는 글 수

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

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
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
             <div class="content_area">
    
        

		<form  name="board_form" method="post" action="list.php?mode=search"> 
		<div id="list_search">
	
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
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
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

?>
			<div class="list_item">
				<div class="list_item1"><?= $number ?></div>
				<div class="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
				
				<div class="list_item4"><?= $item_date ?></div>
				
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
					<a href="list.php?page=<?=$page?>" title="목록"><i class="fas fa-history"></i></a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?page=<?=$page?>" title="글쓰기"><i class="fas fa-pen-alt"></i></a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->
		
        </div> <!-- end of list content -->

		<div class="clear"></div>


             
                 
             </div> 
        </article>
  
    <? include "../common/sub_foot.html" ?>
 <script src="https://kit.fontawesome.com/8f74c3df05.js" crossorigin="anonymous"></script>

</body>

</html>
