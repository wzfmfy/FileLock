<?php
/**
 * @Author: Marte
 */
$connect = mysql_connect('127.0.0.1','root','root');
mysql_query('use php');
mysql_query('set names utf8');
//添加写锁文件
$file = fopen('./lock.txt','w');
//添加文件锁
flock($file,LOCK_EX);
$res = mysql_query('select id from testnum');
$row = mysql_fetch_assoc($res);
$id = $row['id'];
//执行该id+1运算
$id = $id+1;
//执行结果，再写入数据库
mysql_query("update testnum set id = $id");
//文件解锁
flock($file,LOCK_UN);