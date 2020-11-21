@extends('site.app')
@section('title', 'Login')
@section('content')
<div class="body">
    <div role="main" class="main">
        <div class="container">




            <div class="container">


                <div class="row pt-5">
                    <!-- <div class="col-lg-4"> -->
             <!-- <div class="col-12 col-md-4 col-lg-12 mb-lg-4 appear-animation"    ESKİYE BU ŞEKİLDE DONECEK-->

                        <div class="row">
                            <div class="col-3 col-md-3 col-lg-3 mb-lg-3 appear-animation"
                                data-appear-animation="fadeInLeftShorter">
                                <div class="icon-box icon-box-style-1">
                                    <div class="icon-box-icon">
                                        <i class="lnr lnr-apartment text-color-primary"></i>
                                    </div>
                                    <div class="icon-box-info mt-1">
                                        <div class="icon-box-info-title">
                                            <h3 class="font-weight-bold text-4 mb-0">Fabrika</h3>
                                        </div>
                                        <p>
                                            Egepleks Yapı ve Elek.Malz.San.Tic.Ltd.Şti.
                                            10002 Sokak No:15 A.O.S.B. Çiğli / İZMİR</p>
                                    </div>
                                </div>
                            </div>
                                   <div class="col-3 col-md-3 col-lg-3 mb-lg-3 appear-animation"
                                data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                                <div class="icon-box icon-box-style-1">
                                    <div class="icon-box-icon icon-box-icon-no-top">
                                        <i class="lnr lnr-envelope text-color-primary"></i>
                                    </div>
                                    <div class="icon-box-info mt-1">
                                        <div class="icon-box-info-title">
                                            <h3 class="font-weight-bold text-4 mb-0">Email</h3>
                                        </div>
                                        <p><a href="mailto:you@domain.com">info@egepleks.com</a></p>
                                    </div>
                                </div>
                            </div>

                              <div class="col-3 col-md-3 col-lg-3 mb-lg-3 appear-animation"
                                data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
                                <div class="icon-box icon-box-style-1">
                                    <div class="icon-box-icon">
                                        <i class="lnr lnr-phone-handset text-color-primary"></i>
                                    </div>
                                    <div class="icon-box-info mt-1">
                                        <div class="icon-box-info-title">
                                            <h3 class="font-weight-bold text-4 mb-0">Telefon</h3>
                                        </div>
                                        <p><a href="tel:+1234567890"> 0 232 376 80 56 (pbx)</a></p>
                                    </div>
                                </div>
                            </div>

                                   <div class="col-3 col-md-3 col-lg-3 mb-lg-3 appear-animation"
                                data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="600">
                                <div class="icon-box icon-box-style-1">
                                    <div class="icon-box-icon">
                                        <i class="lnr lnr-printer text-color-primary"></i>
                                    </div>
                                    <div class="icon-box-info mt-1">
                                        <div class="icon-box-info-title">
                                            <h3 class="font-weight-bold text-4 mb-0">Fax</h3>
                                        </div>
                                        <p><a href="tel:+1234567890">0 232 328 01 50</a></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <!-- </div> -->
<!--
<div class="col-lg-8 appear-animation" data-appear-animation="fadeInRightShorter">
<form class="contact-form form-style-2" action="{{route('contact.submit')}}" method="POST">
@csrf
<div class="contact-form-success alert alert-success d-none">
<strong>Success!</strong> Your message has been sent to us.
</div>
<div class="contact-form-error alert alert-danger d-none">
<strong>Error!</strong> There was an error sending your message.
<span class="mail-error-message d-block"></span>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<input type="text" value="" data-msg-required="Please enter your name."
maxlength="100" class="form-control" name="name" id="name" placeholder="Name"
required>
</div>
<div class="form-group col-md-6">
<input type="email" value="" data-msg-required="Please enter your email address."
data-msg-email="Please enter a valid email address." maxlength="100"
class="form-control" name="email" id="email" placeholder="E-mail" required>
</div>
</div>
<div class="form-row">
<div class="form-group col">
<input type="text" value="" data-msg-required="Please enter the subject."
maxlength="100" class="form-control" name="subject" id="subject"
placeholder="Subject" required>
</div>
</div>
<div class="form-row">
<div class="form-group col">
<textarea maxlength="5000" data-msg-required="Please enter your message." rows="5"
class="form-control" name="message" id="message" placeholder="Message"
required></textarea>
</div>
</div>
<div class="form-row mt-2">
<div class="col">
<input type="submit" value="SEND MESSAGE"
class="btn btn-primary btn-rounded btn-4 font-weight-semibold text-0"
data-loading-text="Loading...">
</div>
</div>
</form>
</div>
-->

                </div>
            </div>

            <div class="row p-0 m-3 ">
                <div class="col">

                    <div class="card card-style-4 border-0">
                        <div class="image-frame img-shadow">

                            <div id="" class="google-map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3123.0813451360445!2d27.040607015160386!3d38.48576487870758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14bbd055a245b613%3A0xc415ffc89a2075a1!2sEgepleks%20Ltd.%C5%9Eti.!5e0!3m2!1sen!2str!4v1597653933932!5m2!1sen!2str"
                                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @include("site.sections.our_catalogue")
    </div>
    @include("site.partials.footer_lite")
</div>
@stop
