<?php 
header("Content-type: text/html; charset=utf-8"); 
include "include/header.php"; 
include "include/functions.php";
include "connect_db.php";
//mysql_connect("localhost","root","");
//mysql_select_db("guestbook");
//mysql_query();
// ��ȡ��ǰҳ��
if( isset($_GET['page']) ){
   $page = intval( $_GET['page'] );
}
else{
   $page = 1;
}
// ÿҳ����
//$page_size = PAGESIZE;
$page_size = 10;
// ��ȡ��������
$sql = "select count(*) as amount from `tb_message` ";
$result = mysql_query($sql);

if(!$result){echo "cuowu!";}
$row = @mysql_fetch_row($result);
$amount = $row[0];
// �����ܹ��ж���ҳ
if( $amount ){
   if( $amount < $page_size ){ $page_count = 1; }       //�����������С��$PageSize����ôֻ��һҳ
   if( $amount % $page_size ){                       //ȡ������������ÿҳ��������
       $page_count = (int)($amount / $page_size) + 1;   //�������������ҳ������������������ÿҳ���Ľ��ȡ���ټ�һ
   }else{
       $page_count = $amount / $page_size;           //���û����������ҳ������������������ÿҳ���Ľ��
   }
}
else{
   $page_count = 0;
}

// ��ҳ����
$page_string = '';
if( $page == 1 ){
   $page_string .= '��һҳ|��һҳ|';
}
else{
   $page_string .= '<a href=?page=1>��һҳ</a>|<a href=?page='.($page-1).'>��һҳ</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '��һҳ|βҳ';
}
else{
   $page_string .= '<a href=?page='.($page+1).'>��һҳ</a>|<a href=?page='.$page_count.'>βҳ</a>';
}
// ��ȡ���ݣ��Զ�ά�����ʽ���ؽ��
if( $amount ){
   $sql = "select * from `tb_message` order by id desc limit ". ($page-1)*$page_size .", $page_size";

   $result = mysql_query($sql);

 
   while ( $row = mysql_fetch_assoc($result) ){
       $rowset[] = $row;
   }
}else{
   $rowset = array();
}

?>
<!-- main -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
</head>
<body>
<div id="main">
  <div id="sidebar">
    <?php if(checkSession() == true){ ?>
    <ul>
      <li><a href="#" >����Ա��Ϣ</a></li>
      <li>�û���:<?php echo $_SESSION['adminuser'] ;?></li>
      <li>�� ��:<?php echo $_SESSION['adminpass'] ;?></li>
      <li><a href="logincheck.php?do=exit">�˳���¼</a></li>
    </ul>
    <?php }?>
    <br />
    <ul>
	  <li><a href="in.php">Homepage</a></li>
      <li><a href="http://www.w3school.com.cn">Support</a></li>
	
      <li><a href="introduce.html">About Us</a></li>
    </ul>
  </div>
  <div id="text">
    <h1><img src="images/edit-icon.gif"/>All Routes Reviews</h1>
    <?php foreach ($rowset as $row) {?>
    <h2><?php echo($row["title"]); ?></h2>
    <div id="cls" class="cls">&nbsp;&nbsp;<?php echo($row["body"]); ?></div>
    <?php if(!empty($row["reply"])){?>
    <fieldset>
      <legend>����Ա�ظ���</legend>
      <ul>
        <img src="images/arrow.gif" alt="" /> <?php echo($row["reply"]); ?>
      </ul>
    </fieldset>
    <?php } ?>
    <p class="date">Posted by <?php echo($row["visitor"]); ?> <img src="images/more.gif" alt="" /> <?php echo($row["url"]); ?> <img src="images/comment.gif" alt="" /> <?php echo($row["create_at"]); ?> <img src="images/timeicon.gif" alt="" /> 
  
    <?php } mysql_close($conn); ?>
    
  </div>
</div>
<!-- footer -->
<div id="footer">
  
</div>
<!-- end footer -->
</body></html>