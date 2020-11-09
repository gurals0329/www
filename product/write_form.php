<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table='consert
    //수정=> $table=concert $mode=modify $num=2 $page=1

	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
        $item_about     = $row[about];
        $item_kind     = $row[kind];
        
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>작성</title>
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="../sub2/common/css/sub2common.css">
<link rel="stylesheet" href="../sub2/css/content2.css">
 <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
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

	<div id="wrt_col2">
        
		

		<div class="clear"></div>

		<div id="write_form_title">
			글쓰기
		</div>

		<div class="clear"></div>

<?
	if($mode=="modify")  //수정모드일때
	{

?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">  
<?
	}
	else  // 새글쓰기모드일때
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1"><div class="col1"> 별명 </div><div class="col2"><?=$usernick?></div>
<?
	if( $userid && ($mode != "modify") )
	{   //새글쓰기 에서만 HTML 쓰기가 보인다
?>
				<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
<?
	}
?>						
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
            <div class="write_line"></div>
			<div class="write_row2"><div class="col1"> 설명   </div>
			                     <div class="col2"><input type="text" name="about" value="<?=$item_about?>" ></div><div class="write_line"></div>            <div class="write_line"></div>
			<div class="write_row2"><div class="col1"> 코드   </div>
			                     <div class="col2"><input type="text" name="kind" value="<?=$item_kind?>" ></div><div class="write_line"></div>
                

			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용  </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row4"><div class="col1"> 이미지파일1   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
			<div class="clear"></div>
<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<div id="write_row5"><div class="col1"> 이미지파일2  </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
			<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<div class="clear"></div>
			<div id="write_row6"><div class="col1"> 이미지파일3   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>

			<div class="clear"></div>
		</div>

		<div id="write_button" class="button">
                            <input type="submit">&nbsp;
								<a href="list.php?page=<?=$page?>" title="목록"><i class="fas fa-history"></i></a>
		</div>
           
		
            </div>
            </div>
            </form>
        </form>
                
	</div> <!-- end of col2 -->

    </article>
    <? include "../common/sub_foot.html" ?>
<script src="https://kit.fontawesome.com/8f74c3df05.js" crossorigin="anonymous"></script>
</body>

</html>
