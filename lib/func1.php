<?
   function latest_article($table, $loop, $char_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			 $len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);               
                                                       $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

			echo "      
				<li class='col1'><a href='./$table/view.php?table=$table&num=$num'>$subject<span class='col2'>$regist_day</span></a></li> 
				<div class='clear'></div>
			";
		}
		mysql_close();
   }
/*
뉴스
<li><a href="#">메디커튼 사우디아라비아 수출로 중동시장 확장기대<span>2020.04.28</span></a></li>
공지
 <li><a href="#">의약품 회수에 관한 공표대<span>2020.04.28</span></a></li>
*/
?>