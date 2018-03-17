@if(session('success'))
	@if(session('success')['success'])
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4>Sucess</h4>
    		<p>{{session('success')['message']}}</p>
		</div>
		@else
		<div class="callout callout-danger">
			<h4>Error</h4>
    		<p>{{session('success')['message']}} </p>
		</div>
		@endif
@endif 

