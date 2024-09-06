<?php /* Smarty version Smarty-3.1.6, created on 2022-01-22 13:43:45
         compiled from "./Home/Tpl\Pubtest\index.html" */ ?>
<?php /*%%SmartyHeaderCode:546061ea0e12a229d8-83899955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37da36be0c771fcc098228a7e3c3c202efffcd79' => 
    array (
      0 => './Home/Tpl\\Pubtest\\index.html',
      1 => 1642830220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '546061ea0e12a229d8-83899955',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_61ea0e12a9ebc',
  'variables' => 
  array (
    'examsNum' => 0,
    'clicknum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61ea0e12a9ebc')) {function content_61ea0e12a9ebc($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>普测题库搜索</title>
    <meta name="description" content="中职普测题库，德育，语文，数学，英语，计应">
	<meta name="keywords" content="中职普测题库，德育，语文，数学，英语，计应">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="format-detection" content="telephone=no"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="white"/>

    <link rel="icon" type="image/x-icon" href="__PUBLIC__/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/wap/pubtest.css">

    <script type="text/javascript" src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/utifunction.js"></script>
</head>

<body>


<!-- 固定导航栏 -->
<div class="pubts_top">
    <h3><a href="__APP__">普 测 题 库</a></h3>
</div>


<!-- 搜索 -->
<div id="index-card" >

	<div id="header" style="position: relative;">
		<div id="logo">
			<a href="https://m.baidu.com/"><img src="__PUBLIC__/images/pubtslogo.png" alt="百度一下,你就知道"></a>
		</div>
		<form class="se-form" id="index-form" method="POST" action="">
		
			<div class="con-wrap">
				<div class="con-inner-left">
					<select id="subject" name="subject">
						<option value="1" selected="selected">德育</option>
						<option value="2">语文</option>
						<option value="3">数学</option>
						<option value="4">英语</option>
						<option value="5">计应</option>
					</select>
				</div>
				<div class="con-inner-midd">
					<div class="input-wrapper">
						<input type="search" id="index-kw" name="word" class="se-input new-search-input" maxlength="64" placeholder="输入搜索词">
					</div>
				</div>
				<input type="text" tabindex="-1" id="index-bn" class="se-bn " value="百度一下">
			</div>

		</form>
	</div>


	<div id="result">
		<p class="retxt" id="txtResult" style="padding-left:20px;"></p>
		<hr class="split-line-b">
		<ol id="rtlst_box" name="rtlst_box">
		</ol>
	</div>

</div>


<!-- 固定页脚栏 -->
<div class="wrap-foot">
    <div>
    	<ul>
	    	<li>德育<?php echo $_smarty_tpl->tpl_vars['examsNum']->value[1];?>
道题 
	    	<li>语文<?php echo $_smarty_tpl->tpl_vars['examsNum']->value[2];?>
道题 
	    	<li>数学<?php echo $_smarty_tpl->tpl_vars['examsNum']->value[3];?>
道题 
	    	<li>英语<?php echo $_smarty_tpl->tpl_vars['examsNum']->value[4];?>
道题 
	    	<li>计应<?php echo $_smarty_tpl->tpl_vars['examsNum']->value[5];?>
道题 
	    	<li>访问 <?php echo $_smarty_tpl->tpl_vars['clicknum']->value;?>
 次
	    	<li>技术 ：段老师
	    	<li>编程学习群 685806772
    	</ul>
    </div>
</div>


<script>

//查询信息
$("#index-bn").click(function(){
	$('#txtResult').html("");
	$('#rtlst_box').html("");
	var keyword = $("#index-kw").val();
	if( keyword == '' ){
		$('#txtResult').html('对不起，查询不能为空！','','','');
	}else{
		$.ajax({
			type:"POST",
			url:"__APP__/Pubtest/search",
			data:$("#index-form").serializeArray(),
			dataType:"json",
			success:function(data){
				//alert(data.code);
				//alert(data.word);
				//$('#txtResult').html(data.content);
				//$('#txtResult').innerText(data.msg);
				//$('#txtResult').innerHTML(data.msg);

				//返回总数，和最近十条举报记录
				if( data.code == 200 ){
					ohtml= objToHtml( data.data, '<li><p class="retxt2">{sn}：{content}  【<font color="red">答案：<b>{answer}</b></font>】</p></li>');
					$('#rtlst_box').append(ohtml);
					//$('#rtlst_box').html(ohtml);
				}
				else
					$('#txtResult').html(data.data);
			},
			async:true,
			error: function(XmlHttpRequest, textStatus, errorThrown)
			{
				//alert("XMLHttpRequest.readyState="+XmlHttpRequest.readyState);
				//alert("XMLHttpRequest.status="+XmlHttpRequest.status);
				//alert("XMLHttpRequest.responseText="+XmlHttpRequest.responseText);
				//$('#txtResult').html(XmlHttpRequest.responseText);
				alert("error:" + XmlHttpRequest.responseText);
			},
		});
	}
});

</script>

</body>
</html>
<?php }} ?>