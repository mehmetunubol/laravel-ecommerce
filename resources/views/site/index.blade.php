@extends('site.app')
@section('title', 'Homepage')

@section('content')
<div class="body">

					

	<div role="main" class="main">

					@include('site.sections.slider')

		<div class="container">

			@include('site.sections.home_component_1')

			@include('site.sections.divider_w_logo')
			</br>


		</div>
			</br>
			@include('site.sections.home_component_4')
			</br>

			</br>
			<?php //require_once("sections/home_component_5.php"); ?>
			</br>
			@include('site.sections.our_catalogue')
	</div>

	@include('site.sections.footer')

</div>
@stop
