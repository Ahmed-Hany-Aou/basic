<!-- contact-area -->
<section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>"If you have any inquiries, suggestions, or need further information, please don't hesitate to reach out. We are here to assist you with anything you need."</p>
                        <h2 class="mail">
                            <a href="mailto:ahmed.hany.boshra@gmail.com">ahmed.hany.boshra@gmail.com</a>
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form method="post" action="{{ route('store.message') }}">
                            @csrf
                            <input name="name" type="text" placeholder="Enter your name here *" required>
                            <input name="email" type="email" placeholder="Enter your mail *" required>
                            <input name="subject" type="text" placeholder="Enter your subject *" required>
                            <input name="phone" type="number" placeholder="Your Phone*" required>
                            <textarea name="message" id="message" placeholder="Enter your message *" required></textarea>
                            <button type="submit" class="btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
