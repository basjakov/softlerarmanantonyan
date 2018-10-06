
	<form method="post" action="/addemployer" enctype="multipart/form-data" >
	     	 
	     	  {{ csrf_field() }}

	     		<div class="form-group">
						<input type="text" name="first_name" class="form-control" placeholder="first name">
				</div>
				<div class="form-group">
						<input type="text" name="last_name" class="form-control" placeholder="last name">
				</div>
				<div class="form-group">
						<input type="text" name="keywords" class="form-control" placeholder="keywords">
				</div>
				<div class="form-group">
						<input type="file" name="resume" class="form-control">
				</div>
				<div class="form-group">
						<input type="submit"  class="btn btn-success" value="Add employer">
				</div>
			@include('layouts.error')
	</form>
