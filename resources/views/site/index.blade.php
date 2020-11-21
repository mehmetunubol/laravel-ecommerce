@extends('site.app')
@section('title', 'Homepage')
@section('content')
<div class="body">

<div role="main" class="main">

@include('site.sections.slider-3')
@include('site.sections.divider_without_logo')
<div class="container">

@include('site.sections.home_component_3')
@include('site.sections.divider_w_logo')
</br>

@include('site.sections.homepage_featured')
@include('site.sections.divider_w_logo')
</br>

</div>

</br>
@include('site.sections.new_couresel')
</br>
@include('site.sections.divider_w_logo')
</br>
@include('site.sections.discount_couresel')
</br>
</br>
@include('site.sections.our_catalogue')
</div>

@include('site.partials.footer')

</div>
@stop
