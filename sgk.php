<?php
ob_start();
session_start();
$serverName     = ''; //sqlserver
// ���ݿ��������ַ
$uid            = '';
// ���ݿ��û���
$pwd            = '';
// ���ݿ�����

$connectionInfo = array("UID"=>$uid, "PWD"=>$pwd, "Database"=>"new");

$conn = sqlsrv_connect( $serverName, $connectionInfo);
if (is_file($_SERVER['DOCUMENT_ROOT'] . '/360safe/360webscan.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/360safe/360webscan.php');
} // ע���ļ�·��
if( $conn == false)

{

echo "����ʧ�ܣ�";

// die( print_r( sqlsrv_errors(), true));

}
$host     = ''; //���ݿ������
$user     = ''; //���ݿ��û���
$password = ''; //���ݿ�����
$database = ''; //���ݿ���
$conn1 = @mysql_connect($host, $user, $password) or die('���ݿ�����ʧ�ܣ�');
@mysql_select_db($database) or die('û���ҵ����ݿ⣡');
mysql_query("set names utf8");
?>