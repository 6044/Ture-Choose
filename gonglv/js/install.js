function install(s) {

if (s.server.value == "")
{
alert('��������ַ����Ϊ�գ�');
return false;
}

if (s.mysqlname.value == "")
{
alert('MYSQL�û�������Ϊ�գ�');
return false;
}

if (s.mysqlpass.value == "")
{
alert('MYSQL���벻��Ϊ�գ�');
return false;
}

if (s.mysqldb.value == "")
{
alert('MYSQL���ݿ�������Ϊ�գ�');
return false;
}

if (s.adminname.value == "")
{
alert('��̨�˺Ų���Ϊ�գ�');
return false;
}

if (s.adminpass.value == "")
{
alert('��̨���벻��Ϊ�գ�');
return false;
}
}
