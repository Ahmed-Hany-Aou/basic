@php

$allfooter = App\Models\Footer::find(1);

@endphp

@extends('frontend.main_master')
@section('main')

@section('title')
Contact | Hany's Work
@endsection


 <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">Contact us</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        <li><img src="assets/img/icons/breadcrumb_icon01.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon02.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon03.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon04.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon05.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon06.png" alt=""></li>
                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- contact-map -->
            <div id="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14161.473311975766!2d31.348676545580908!3d30.06978287546113!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fe1f140f06b%3A0xf3c8c147aca049f4!2sComma%20Co-working%20space%20%22Nasr%20City%20Branch%22!5e0!3m2!1sen!2seg!4v1729937162383!5m2!1sen!2seg" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      
            </div>
            <!-- contact-map-end -->

            <!-- contact-area -->
            <div class="contact-area">
                <div class="container">
    <form method="post" action="{{ route('store.message') }}" class="contact__form">
    	@csrf

        <div class="row">
            <div class="col-md-6">
                <input  name="name" type="text" placeholder="Enter your name here*">
            </div>
            <div class="col-md-6">
                <input name="email" type="email" placeholder="Enter your mail*">
            </div>
            <div class="col-md-6">
                <input  name="subject" type="text" placeholder="Enter your subject*">
            </div>
            <div class="col-md-6">
                <input  name="phone" type="text" placeholder="Your Phone*">
            </div>
        </div>
        <textarea name="message" id="message" placeholder="Enter your massage*"></textarea>
        <button type="submit" class="btn">send massage</button>
    </form>
                </div>
            </div>
            <!-- contact-area-end -->

            <!-- contact-info-area -->
            <section class="contact-info-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="contact__info">
                                <div class="contact__info__icon">
                                    <img src="{{ asset('frontend/assets/img/icons/contact_icon01.png') }}" alt="">
                                </div>
                                <div class="contact__info__content">
                                    <h4 class="title">address line</h4>
                                    <span>{{ $allfooter->adress }} <!--<br> Egypt --> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="contact__info">
                                <div class="contact__info__icon">
                                    <img src="{{ asset('frontend/assets/img/icons/contact_icon02.png') }}" alt="">
                                </div>
                                <div class="contact__info__content">
                                    <h4 class="title">Phone Number</h4>
                                    <span>{{$allfooter->number}}</span>
                                  <!--  <span>+1255 - 568 - 6523</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="contact__info">
                                <div class="contact__info__icon">
                                    <img src="{{ asset('frontend/assets/img/icons/contact_icon03.png') }}" alt="">
                                </div>
                                <div class="contact__info__content">
                                    <h4 class="title">Mail Address</h4>
                                    <span>{{ $allfooter->email }}</span>
                                  <!--  <span>info@yourdomain.com</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-info-area-end -->

            <!-- contact-area -->
            <!-- contact-area -->


 <!--           
<section class="homeContact homeContact__style__two">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact us</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>Feel free to reach out if you have any questions. We are here to help!</p>
                        <h2 class="mail">
                            <a href="mailto:info@webmail.com">info@webmail.com</a>
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form method="post" action="{{ route('store.message') }}" class="contact__form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input 
                                        name="name" 
                                        type="text" 
                                        placeholder="Enter your name secontd form*" 
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        name="email" 
                                        type="email" 
                                        placeholder="Enter your email*" 
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        name="subject" 
                                        type="text" 
                                        placeholder="Enter your subject*" 
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        name="phone" 
                                        type="tel" 
                                        placeholder="Your phone number*" 
                                        pattern="[0-9]{10}" 
                                        title="Please enter a valid 10-digit phone number">
                                </div>
                            </div>
                            <textarea 
                                name="message" 
                                id="message" 
                                placeholder="Enter your message*" 
                                rows="5" 
                                required>
                            </textarea>
                            <button type="submit" class="btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
contact-area-end 

             contact-area-end -->

        </main>

@endsection