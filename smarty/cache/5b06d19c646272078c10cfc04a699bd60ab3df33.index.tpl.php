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
    '3ce3b413f6943a3cb78bad3ca6d7606ada58b50d' => 
    array (
      0 => 'smarty/templates/header.tpl',
      1 => 1373445020,
      2 => 'file',
    ),
    '4029bb8061006068a0ed039e770b42556c506916' => 
    array (
      0 => 'smarty/templates/headInfo.tpl',
      1 => 1373260790,
      2 => 'file',
    ),
    '68501fced1c18ea7d125b272fb61e07e79e49069' => 
    array (
      0 => 'smarty/templates/registrationForm.tpl',
      1 => 1373692897,
      2 => 'file',
    ),
    '7078552075d617a5cbee87f74ec2b36b1d711d33' => 
    array (
      0 => 'smarty/templates/footer.tpl',
      1 => 1373265017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40515410651db148581d670-88927943',
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51e5040235a8f3_84822801',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e5040235a8f3_84822801')) {function content_51e5040235a8f3_84822801($_smarty_tpl) {?><!DOCTYPE html>
<html>

<head>
	<title>E connect</title>
	<link rel="stylesheet" type="text/css" href="smarty/templates/css/style.css" />
<meta />
<script></script> 
</head>
<body>


<form method="POST">
	<table>
		<tr>
			<td>Username :</td><td> <input type="text" name="username" placeholder="Username"/></td>
		</tr>
		<tr>
			<td>Firstname :</td><td> <input type="text" name="firstname" placeholder="Firstname"/></td>
		</tr>
		<tr>
			<td>Lastname :</td><td> <input type="text" name="lastname" placeholder="Lastname"/></td>
		</tr>
		<tr>
			<td>Email :</td><td> <input type="email" name="email" placeholder="Your Email"/></td>
		</tr>
		<tr>
			<td>Gender :</td><td> <input type="radio" name="gender" value="male"/> Male <input type="radio" name="gender" value="female"/> Female</td>
		</tr>
		<tr>
			<td>DOB :</td>
			<td>
				  <select name="date">
						<option>date</option>
						<option value="1">1</option>
						 <option value="2">2</option>
						 <option value="3">3</option>
						 <option value="4">4</option>
						 <option value="5">5</option>
						 <option value="6">6</option>
						 <option value="7">7</option>
						 <option value="8">8</option>
						 <option value="9">9</option>
						 <option value="10">10</option>
						 <option value="11">11</option>
						 <option value="12">12</option>
						 <option value="13">13</option>
						 <option value="14">14</option>
						 <option value="15">15</option>
						 <option value="16">16</option>
						 <option value="17">17</option>
						 <option value="18">18</option>
						 <option value="19">19</option>
						 <option value="20">20</option>
						 <option value="21">21</option>
						 <option value="22">22</option>
						 <option value="24">23</option>
						 <option value="25">26</option>
						 <option value="27">27</option>
						 <option value="28">28</option>
						 <option value="29">29</option>
						 <option value="30">30</option>
						 <option value="31">31</option>
				  </select>
				  <select name="month">
						<option>month</option>
						<option value="month">month</option>
						 <option value="jan">Jan</option>
						 <option value="feb">Feb</option>
						 <option value="mar">Mar</option>
						 <option value="april">April</option>
						 <option value="may">May</option>
						 <option value="jun">Jun</option>
						 <option value="july">July</option>
						 <option value="aug">Aug</option>
						 <option value="sep">Sep</option>
						 <option value="oct">Oct</option>
						 <option value="nov">Nov</option>
						 <option value="dec">Dec</option>								
				  </select>
				  <select name="year">
						<option>year</option>	
					    <option value="2000">2000</option>
						 <option value="1999">1999</option>
						 <option value="1998">1998</option>
						 <option value="1997">1997</option>
						 <option value="1996">1996</option>
						 <option value="1995">1995</option>
						 <option value="1994">1994</option>
						 <option value="1993">1993</option>
						 <option value="1992">1992</option>
						 <option value="1991">1991</option>
						 <option value="1990">1990</option>
						 <option value="1989">1989</option>
						 <option value="1988">1988</option>
						 <option value="1987">1987</option>
						 <option value="1986">1986</option>
						 <option value="1985">1985</option>
						 <option value="1984">1984</option>
						 <option value="1983">1983</option>
						 <option value="1982">1982</option>
						 <option value="1981">1981</option>
						 <option value="1980">1980</option>
						 <option value="1979">1979</option>
						 <option value="1978">1978</option>
						 <option value="1977">1977</option>
						 <option value="1976">1976</option>
						 <option value="1975">1975</option>
						 <option value="1974">1974</option>
						 <option value="1972">1972</option>
						 <option value="1971">1971</option>							
				  </select>
			</td>
		</tr>
		<tr>
			<td>Password :</td><td> <input type="password" name="password" placeholder="Password"/> </td>
		</tr>
		<tr>
			<td>Confirm Password :</td><td> <input type="password" name="confirmPassword" placeholder="Confirm Password"/></td>
		</tr>
		<tr>
			<td></td><td> <input type="submit"/></td>
		</tr>
	</table>
</form>

<div id="footer">
	<p>&copy; E-Connect</p>
</div>
</body>
</html>
<?php }} ?>