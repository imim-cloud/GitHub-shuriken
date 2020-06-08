@extends('layout')

@section('head')
<title>{{ ucwords($keyword) }}</title>
@endsection

@section('bg')
{{ collect($images)->random()['url'] }}
@endsection

@section('header')
	<h1>{{ ucwords($keyword) }}</h1>
			<!--ads/auto.txt-->
	@php
		shuffle($sentences);
	@endphp

	<div class="navi text-left">
		@if(!empty($sentences))
			<p>{{ @array_pop($sentences) }} {{ @array_pop($sentences) }} {{ @array_pop($sentences) }} <br>
				@foreach($related as $r)
					@if(data_exists($r))
						<a class="badge badge-{{ collect(['primary', 'secondary', 'success', 'info', 'danger', 'warning', 'light', 'dark'])->random() }}" href="{{ image_url($r) }}">{{ $r }}</a>
					@endif
				@endforeach
			</p>
		@endif
	</div>

@endsection

@section('content')
	
	
	<div class="posts-singles">		
		<div class="posts-content"> 
			<div class="text-left">
				<h3>{{ @array_pop($sentences) }}</h3>
				<p class="text-center"><img src="{{ collect($images)->random()['url'] }}" style="margin-bottom: 8px;"></p>

				@foreach(collect($sentences)->chunk(4) as $chunked_sentences)
					<p>
						@if($loop->first)
							<strong>{{ ucfirst($keyword) }}</strong>. 
						@endif

						@foreach($chunked_sentences as $chunked_sentence)
							{{ $chunked_sentence }} 
						@endforeach
					</p>
				@endforeach
			</div> 
		</div> 
	@foreach(collect($images)->shuffle()->chunk(98) as $chunked)		
			@if($loop->iteration == 1)
				@foreach($chunked as $image)
					<div class="posts-picture"> 
						<a href="#" target="_blank">
							<img class="img-fluid" src="{{ $image['url'] }}" alt="{{ $image['title'] }}" onerror="this.onerror=null;this.src='https://i.stack.imgur.com/MnyxU.gif';"></a>
						<p class="text-center">{{ $image['title'] }}</p> 
							<!--ads/auto.txt-->
					</div>
				@endforeach
			@else
				@foreach($chunked as $image)
					<div class="posts-gallery">
						<div class="posts-gallery-content">
							<a href="{{ preview_url($image) }}" target="_blank">
								<img class="img-fluid" src="{{ $image['url'] }}" alt="{{ $image['title'] }}" onerror="this.onerror=null;this.src='https://i.stack.imgur.com/MnyxU.gif';"></a>
						</div>
					</div>
				@endforeach
			@endif

	@endforeach 
		<div class="clearfix"></div>
	</div>  	
	
@endsection
