<?php /* Smarty version Smarty-3.1.14, created on 2013-07-10 14:00:25
         compiled from "smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40515410651db148581d670-88927943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b06d19c646272078c10cfc04a699bd60ab3df33' => 
    array (
      0 => 'smarty/templates/index.tpl',
      1 => 1373312512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40515410651db148581d670-88927943',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51db148588bd47_07466700',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51db148588bd47_07466700')) {function content_51db148588bd47_07466700($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("registrationForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>

<?php }} ?>