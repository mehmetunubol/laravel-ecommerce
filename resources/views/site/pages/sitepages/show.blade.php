@extends('site.app')
@section('title', 'Login')
@section('content')
<div class="body">
   <div role="main" class="main">
      {!! $sitepage->content !!}
      @include("site.sections.our_catalogue")
   </div>
   @include("site.partials.footer_lite")
</div>
@stop