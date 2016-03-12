
<div class="row">
	<fieldset>
<?php
echo form_open("Users_c/validFormModifierInfo")."\n";
echo form_hidden('id',$id);

echo form_label('Email : ', 'email');
echo form_input('email',set_value('email',$email))."\n";
echo form_error('email','<span class="error">',"</span>");

echo form_label('Nom : ', 'nom');
echo form_input('nom',set_value('nom',$nom))."\n";
echo form_error('nom','<span class="error">',"</span>");

echo form_label('Login : ', 'login');
echo form_input('Login',set_value('login',$login))."\n";
echo form_error('Login','<span class="error">',"</span>");

echo form_label('Password : ', 'password');
echo form_input('Password',set_value('password',$password))."\n";
echo form_error('Password','<span class="error">',"</span>");


?>
</fieldset>
</div>