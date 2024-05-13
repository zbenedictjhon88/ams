<!DOCTYPE html>
<html>
    <head>
        <?php include 'includes/_head.php'; ?>
    </head>
    <body>

        <div class="hero_area">
            <?php include 'includes/_header.php'; ?>
            <?php include 'includes/_banner.php'; ?>
        </div>

        <!-- about section -->
        <section class="about_section layout_padding-bottom">
            <div class="square-box">
                <img src="images/square.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-box">
                            <img src="images/about-img.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>
                                    About Our Apartment
                                </h2>
                            </div>
                            <p>
                                Discover the benefits of apartment living with us! From convenient amenities to hassle-free maintenance, 
                                our apartments offer the perfect blend of comfort and convenience. 
                                Join our community and experience the best of urban living today!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about section -->

        <!-- price section -->

        <section class="price_section layout_padding-bottom">
            <div class="container">
                <div class="heading_container">
                    <h2>
                        Our Room Type
                    </h2>
                </div>
                <div class="price_container">
                    <div class="box">
                        <div class="detail-box">
                            <div class="heading-box">
                                <h4>
                                    01
                                </h4>
                                <h6>
                                    One-Bedroom Apartment
                                </h6>
                            </div>
                            <div class="text-box">
                                <p>
                                    Typically consists of a separate bedroom, a living area, kitchen, and bathroom.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="detail-box">
                            <div class="heading-box">
                                <h4>
                                    02
                                </h4>
                                <h6>
                                    Two-Bedroom Apartment
                                </h6>
                            </div>
                            <div class="text-box">
                                <p>
                                    Offers two separate bedrooms along with a living area, kitchen, and bathroom.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="detail-box">
                            <div class="heading-box">
                                <h4>
                                    01
                                </h4>
                                <h6>
                                    Duplex/Triplex Apartment
                                </h6>
                            </div>
                            <div class="text-box">
                                <p>
                                    Multi-level units with two or three floors, offering more space and separation.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end price section -->

        <!-- contact section -->
        <section class="contact_section ">
            <div class="container">
                <div class="heading_container">
                    <h2>
                        Get In Touch
                    </h2>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5 " style="margin:auto;">
                        <div class="form_container">
                            <form action="">
                                <div>
                                    <input type="text" placeholder="Name" />
                                </div>
                                <div>
                                    <input type="email" placeholder="Email" />
                                </div>
                                <div>
                                    <input type="text" placeholder="Phone Number" />
                                </div>
                                <div>
                                    <input type="text" class="message-box" placeholder="Message" />
                                </div>
                                <div class="d-flex ">
                                    <button>
                                        Send
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- end contact section -->

        <!-- footer section -->
        <section class="container-fluid footer_section ">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="https://html.design/">AMS</a>
                </p>
            </div>
        </section>
        <!-- end  footer section -->

        <?php include 'includes/_footer.php'; ?>
    </body>
</html>
