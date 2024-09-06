<?php /* Smarty version Smarty-3.1.6, created on 2022-01-20 14:57:20
         compiled from "./Admin/Tpl\Question\replay.html" */ ?>
<?php /*%%SmartyHeaderCode:262761e907d08c4008-68095300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27ec76367198a9e2e882cc2623299f7191772dee' => 
    array (
      0 => './Admin/Tpl\\Question\\replay.html',
      1 => 1393405586,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '262761e907d08c4008-68095300',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_61e907d08fc59',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61e907d08fc59')) {function content_61e907d08fc59($_smarty_tpl) {?>
<div class="pageContent">
	<form method="post" action="__URL__/update/navTabId/listquestion/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><<?php ?>?php  //窗体组件采用这个 iframeCallback(this, navTabAjaxDone); ?<?php ?>>
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"/>
		<input type="hidden" name="rtime" value="1"/>
		<div class="pageFormContent" layoutH="60">
			<dl style='height:130px'>
				<dt>问题：</dt>
                <dd><?php echo $_smarty_tpl->tpl_vars['vo']->value['content'];?>
</dd>
            </dl>
			<dl style='height:130px'>
				<dt>回复：</dt>
				<dd><textarea class='editor' rows='5' cols='55' name="replay" tools='simple' upImgUrl='__URL__/doupload' upImgExt='jpg,jpeg,gif,png'><?php echo $_smarty_tpl->tpl_vars['vo']->value['replay'];?>
</textarea></dd>
            </dl>
            <dl style='height:30px'>
                <dt><input type='checkbox' name='remind' value='1'> <b>提醒</b></dt>
            </dl>
		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>

<?php }} ?>