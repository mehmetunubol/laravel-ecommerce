<!--
    In this view we are extending the layout file app.blade.php and passing the title to view. 
    Next we are passing the main content using the @section('content') directive. 
    Nothing fancy, simple blade view.
 -->

@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> {{ __("Kontrol Paneli") }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('admin.users.index') }}" class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>{{ __("Üyeler") }}</h4>
                    <p><b>5</b></p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('admin.statistics.product.view') }}" class="widget-small info coloured-icon">
                <i class="icon fa fa-thumbs-o-up fa-3x"></i>
                <div class="info">
                    <h4>Görüntülemeler</h4>
                    <!--<p><b>25</b></p>-->
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('admin.orders.index') }}" class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Siparişler</h4>
                    <p><b>10</b></p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('admin.statistics.product.cart') }}" class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Sepet istatistikleri</h4>
                    <!--<p><b>500</b></p>-->
                </div>
            </a>
        </div>
    </div>
@endsection