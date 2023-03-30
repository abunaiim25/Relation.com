

<div class="container d-flex justify-content-center">
	<div class="card p-4">
		<div class="input-group">
			<input type="text" class="form-control">
			<div class="input-group-append"><button class="btn btn_primary"><i class="fas fa-search"></i></button></div>
		</div>
	</div>	
</div>

<style>
.card{
	width: 100%;
	border: none;
	border-radius: 20px;
}
.form-control{
	border-radius: 7px;
	border: 1.5px solid #E3E6ED;
}
input.form-control:focus{
	box-shadow: none;
	border: 1.5px solid #E3E6ED;
	background-color: #F7F8FD;
	letter-spacing: 1px;
}
.btn_primary{
	background-color: hsl(0, 59%, 41%)!important;
	border-radius: 7px;
  color: white!important;
}
.btn_primary:focus{
	box-shadow: none;
}
</style>