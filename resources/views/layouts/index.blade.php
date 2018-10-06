@extends ('layouts.master')

@section('content')
   <main role="main" style="margin-top: 5%;">
   		<div class="row">
   			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
   				@include('layouts.add')
   			</div>
   			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
   				<form action="/search" method="get">
		   				<div class="form-group">
		   					<input type="search" name="search" class="form-control" placeholder="որոնել">
		   				</div>
   				<div class="form-group">
   					 <input type="submit" class="btn btn-success" value="search">
   				</div>
   				</form>
   			</div>
   		</div>
     	</div>
		<div class="container">
 	<div class="row">
 		<div class="col-sm-12 col-xs-12 col-md-6 col-lg-8">
		 	<div class="table-responsive"> 
			 <table class="table">
			   	<thead>
			   		<tr>
			   			<th>name</th>
			   			<th>lastname</th>
			   			<th>keywords</th>
			   			<th>resume</th>
			   		</tr>
			 </thead>
			 <tbody>
			   	@foreach ($employers as $employer)
			   		<tr>
		            
		              <td> {{$employer->first_name}} </td>
		              <td> {{$employer->last_name}} </td>
		              <td> {{$employer->keywords}} </td>
		              <td> <a href="uploads/{{$employer->filename}}">View</a></td>
		            


		          </tr>

			   	@endforeach
			  </tbody>
		   </table>
		  </div>
		</div>
		
</div>


</div>

  </main>
@endsection


@section('footer')
   
@endsection
