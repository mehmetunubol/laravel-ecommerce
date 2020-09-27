@extends('site.app')
@section('title', 'Login')
@section('content')
<div class="body">
	<div role="main" class="main">
		<div class="container">
			<div class="row">
				@include("site.pages.account.account_page_sidebar")
				@include("site.account.$page_name")
			</div>
		</div>
	</div>
	@include("site.partials.footer_lite")
</div>
@stop
