<br><br><br><br>
<body class="text-center">
	<?php echo validation_errors(); ?>
	<?php echo form_open('/register/'); ?>
	<h3><?php echo $title;?></h3>
	<div class="form-group col-4 offset-4">
		<input type="text" name="username" class="form-control" id="username" placeholder="Username">
	</div>
	<div class="form-group col-4 offset-4">
		<input type="password" name="password" class="form-control" id="password" placeholder="Password">
	</div>
	<div class="form-group col-4 offset-4">
		<select class="form-control" name="tipeakun">
			<option value="1">User</option>
			<option value="2">Admin</option>
		</select>
	</div>
	<div class="col-4 offset-4">
		<input type="submit" class="btn btn-primary col-12" value="Daftar">
	</div>
	<br>
	Sudah punya akun? <a href="<?php echo base_url();?>login">Login</a>
</form>
</body>

<br><br><br><br><br>