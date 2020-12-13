@extends('site.app')
@section('title', 'Ürün')
@section('content')

<div class="body">
<div role="main" class="main">
<div class="container">



<div class="row p-1 m-3 ">
<h2 class="font-weight-bold text-6 mb-3">ÖDEMENİZ ALINMIŞTIR</h2>
<div class="col">
</div>
</div>


<div class="row p-1 m-3 ">
<div class="col">
	<h2 class="font-weight-bold text-6 mb-3">TEŞEKKÜR EDERİZ</h2>




</div>
</div>





        @include("site.content.recently_viewed_products");


</div>


		@include("site.sections.our_catalogue")

</div>


		@include("site.partials.footer_lite")
</div>

@stop