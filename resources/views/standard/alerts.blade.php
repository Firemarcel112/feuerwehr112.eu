@if(!empty(session('messages')))
	@foreach(Session::get('messages') as $type => $messages)
		@if($type == 'error')
			@foreach($messages as $message)
			<div class="alert alert-danger alert-dismissible" role="alert">
				<div class="d-flex">
					<div>
						@include('standard.icons.alert-circle')
					</div>
					<div>
						{{ $message?? "" }}
					</div>
				</div>
				<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
			</div>
			@endforeach
			@php
				Session::forget('messages.error');
			@endphp
		@endif

		@if($type == 'success')
			@foreach($messages as $message)
			<div class="alert alert-success alert-dismissible" role="alert">
				<div class="d-flex">
					<div>
						@include('standard.icons.alert-circle')
					</div>
					<div>
						{{ $message?? "" }}
					</div>
				</div>
				<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
			</div>
			@endforeach
			@php
				Session::forget('messages.success');
			@endphp
		@endif
	@endforeach
@endif

@if($errors->any())
	@foreach($errors->all() as $error)
		<div class="alert alert-danger alert-dismissible" role="alert">
			<div class="d-flex">
				<div>
					@include('standard.icons.alert-circle')
				</div>
				<div>
					{{ $error?? "" }}
				</div>
			</div>
			<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
		</div>
	@endforeach
@endif
