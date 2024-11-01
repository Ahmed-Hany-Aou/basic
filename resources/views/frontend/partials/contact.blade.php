<!-- contact-area -->
<section class="homeContact py-5">
    <div class="container mt-5">           <!--  it pushes the area above ----بتزوق اللي فوقيها-->
        <div class="homeContact__wrap">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content mt-3">
                        <p>
                            "If you have any inquiries, suggestions, or need further information, please don't hesitate to reach out. 
                            We are here to assist you with anything you need."
                        </p>
                        <h2 class="mail">
                            <a href="mailto:ahmed.hany.boshra@gmail.com">ahmed.hany.boshra@gmail.com</a>
                        </h2>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form method="post" action="{{ route('store.message') }}" class="contact-form">
                            @csrf
                            <div class="form-group mb-3">
                                <input class="form-control" name="name" type="text" placeholder="Enter your name here *" required>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" name="email" type="email" placeholder="Enter your mail *" required>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" name="subject" type="text" placeholder="Enter your subject *" required>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" name="phone" type="number" placeholder="Your Phone*" required>
                            </div>
                            <div class="form-group mb-3">
                                <textarea class="form-control" name="message" id="message" placeholder="Enter your message *" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
