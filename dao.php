<?php
header("Content-type: text/html; charset=gbk"); 
//������
$dos = array('new', 'reply', 'delete');
$do = (!empty($_GET['do']) && in_array($_GET['do'], $dos))?$_GET['do']:'index';
if($do == 'in'){
 redirect("ind.php");
}
include "include/common.php";
include "include/functions.php";
//��Ӳ���
if($do=='new') {
    //����
	$title=$_POST["title"];
	//����
	$visitor=$_POST["vname"];
	//��ַ
	$url=$_POST["url"];
	//����
	$body=$_POST["body"];
	//ʱ��
	$create_at=date("Y-m-d");
	//��֤�Ƿ�Ϊ��
	if($title=="" or $visitor=="" or $body==""){
		  showmsg("new.php","���⡢���������ݶ�����Ϊ�գ����顣");
	}else{
		$query="insert into tb_message(visitor,url,body,title,create_at) values("
		."'".$visitor."','".$url."','".$body."','".$title."',date('".$create_at."'))";
		mysql_query($query);
		mysql_close($conn);
		showmsg("in.php","��ӳɹ���ת����ҳ��"); 
	}
}
//���²���
if($do=='reply') {
	//�ظ�����
	$reply=$_POST["reply"];
	$query="update tb_messages set reply='".$reply."' where id=".$_POST["msgid"];
	mysql_query($query);
	mysql_close($conn);
	showmsg("in.php","�ظ��ɹ���ת����ҳ��"); 
}
//ɾ������
if($do=='delete') {
	//if(!checkSession())
	//{
	//showmsg("login.php","���ȵ�¼���ٲ���!"); 
	//}
	//else{
	//"delete from 'tb_messages' where id=".$_GET["id"];
	$id =$_GET["id"];
	mysql_query("delete from tb_messages where id=$id");
	mysql_close($conn);
	showmsg("in.php","ɾ���ɹ���ת����ҳ��"); 
}


?>