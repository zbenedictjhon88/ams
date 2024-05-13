<!DOCTYPE html>
<html>
    <head>
        <?php include 'includes/_head.php'; ?>
    </head>
    <body class="sub_page"> 

        <div class="hero_area">
            <?php include 'includes/_header.php'; ?>
        </div>

        <!-- about section -->
        <section class="contact_section layout_padding-top">
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
                            
                            <div id="message-alert"></div>

                            <form class="feedback-form" action="#" method="post" autocomplete="off">
                                <input type="hidden" name="feedback" value="feedback"  />
                                <div>
                                    <input type="text" name="name" placeholder="Name" required="" />
                                </div>
                                <div>
                                    <input type="email" name="email" placeholder="Email" required="" />
                                </div>
                                <div>
                                    <input type="text" name="content" class="message-box" placeholder="Message" required="" />
                                </div>
                                <div class="d-flex ">
                                    <input type="submit" value="Send" />
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- end about section -->


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
