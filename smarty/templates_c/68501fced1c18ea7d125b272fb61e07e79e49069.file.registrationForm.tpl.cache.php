<?php /* Smarty version Smarty-3.1.14, created on 2013-07-09 01:11:28
         compiled from "smarty/templates/registrationForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10256728751db15e8580ca6-39542755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68501fced1c18ea7d125b272fb61e07e79e49069' => 
    array (
      0 => 'smarty/templates/registrationForm.tpl',
      1 => 1373266078,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10256728751db15e8580ca6-39542755',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51db15e85840d4_40422172',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51db15e85840d4_40422172')) {function content_51db15e85840d4_40422172($_smarty_tpl) {?><form method="POST">
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
					    <option value="1">2000</option>
						 <option value="2">1999</option>
						 <option value="3">1998</option>
						 <option value="4">1997</option>
						 <option value="5">1996</option>
						 <option value="6">1995</option>
						 <option value="7">1994</option>
						 <option value="8">1993</option>
						 <option value="9">1992</option>
						 <option value="10">1991</option>
						 <option value="11">1990</option>
						 <option value="12">1989</option>
						 <option value="13">1988</option>
						 <option value="14">1987</option>
						 <option value="15">1986</option>
						 <option value="16">1985</option>
						 <option value="17">1984</option>
						 <option value="18">1983</option>
						 <option value="19">1982</option>
						 <option value="20">1981</option>
						 <option value="21">1980</option>
						 <option value="22">1979</option>
						 <option value="24">1978</option>
						 <option value="25">1977</option>
						 <option value="27">1976</option>
						 <option value="28">1975</option>
						 <option value="29">1974</option>
						 <option value="30">1972</option>
						 <option value="31">1971</option>							
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
</form><?php }} ?>