<?php
/*
    Template Name: Contact Us
*/
?>
<?php get_header(); ?>
<style>
    a.btn-nofill, .btn-nofill{
        padding: 10px 15px;
        cursor: pointer;
    }
</style>

<section class="fullpage">
    <div class="section container-fluid multiple-info-rows" data-anchor="we_are">
        <div class="row contact-us-wrapper h-100">
            <div class="col-lg-7 col-12  contactUs-left-panel">
                <h1 class="main-heading contact-us-mb">
                    Get in Touch
                </h1>
                <p class="happy-new-contacts contact-us-mb">We are always happy to make valuable new contacts.</p>
                <div class="get-in-touch-container">
                    <div class="row get-in-touch">
                        <div class="col-lg-1 col-12 padding-none">
                            <img class="img-fluid mx-auto d-block" src="<?php echo get_template_directory_uri(); ?>/inc/imgNew/mountain-view.png" alt="mountain-view">
                        </div>
                        <div class="col-lg-11 col-12">
                            <p class="location">Mountain View, CA</p>
                            <p class="address">
                                1975 W. El Camino Real, Suite # 301,
                            </p>
                            <p class="address"> CA 94040.</p>
                            <p class="tel tel">Tel: +1-866-660-6533,</p>
                            <p class="tel"> Fax: +1-408-435-2703</p>
                        </div>
                    </div>

                    <div class="row get-in-touch">
                        <div class="col-lg-1 col-12 padding-none">
                            <img class="img-fluid mx-auto d-block" src="<?php echo get_template_directory_uri(); ?>/inc/imgNew/hyderaba.png" alt="hyderabad">
                        </div>
                        <div class="col-lg-11 col-12">
                            <p class="location">Hyderabad, INDIA</p>
                            <p class="address">
                                Midtown, Road No. 1, Banjara Hills,
                            </p>
                            <p class="address">Hyderabad, TS 500034.</p>
                            <p class="tel"> Tel: +91-40-3355 2000</p>
                        </div>
                    </div>

                    <div class="row get-in-touch">
                        <div class="col-lg-1 col-12 padding-none">
                            <img class="img-fluid mx-auto d-block" src="<?php echo get_template_directory_uri(); ?>/inc/imgNew/chennai.png" alt="chennai">
                        </div>
                        <div class="col-lg-11 col-12">
                            <p class="location">Chennai, INDIA</p>
                            <p class="address">
                                #7, Perungudi Industrial Estate,
                            </p>
                            <p class="address"> Chennai, TN 600096.</p>
                            <p class="tel"> Tel: +91-44-3355 2000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-12 contactUs-right-panel hidden-md-down">
                <form role="form" id="signup" name="contact"
                onsubmit="return validateFormOnSubmit(this)" action="" method="post">
                    <h2 class="subhead contact-us">
                        Send us a message
                    </h2>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name">
                        <label class="float-label" for="fullname">Full name</label>
                        <div class="error name-error"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="email">
                        <label class="float-label" for="Emailid">Email id</label>
                        <div class="error email-error"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" id="phone">
                        <label class="float-label" for="Mobileno">Mobile no.</label>
                        <div class="error test"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="info"></textarea>
                        <label class="float-label" for="Mobileno">Message</label>
                    </div>
                    <button type="submit" class="btn btn-nofill btn-transparent">Send</button>
                </form>
            </div>
        </div>
	</div>

    <div class="section hidden-md-up contactUs-right-panel container-fluid" data-anchor="we_are">
         <div class="">
            <form role="form" id="signup" name="contact"
            onsubmit="return validateFormOnSubmit(this)" action="" method="post">
                <h1 class="main-heading contact-us">
                    Send us a message
                </h1>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name">
                    <label class="float-label" for="fullname">Full name</label>
                    <div class="error name-error"></div>
                </div>


                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="email">
                    <label class="float-label" for="Emailid">Email id</label>
                    <div class="error email-error"></div>
                </div>


                <div class="form-group">
                    <input type="text" name="phone" class="form-control" id="phone">
                    <label class="float-label" for="Mobileno">Mobile no.</label>
                    <div class="error test"></div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" rows="5" id="info"></textarea>
                    <label class="float-label" for="Mobileno">Message</label>
                </div>

                <button type="submit" class="btn btn-nofill btn-transparent">Send</button>
            </form>
        </div>
	</div>


	<div class="section contact-us-footer contact" data-anchor="contact">
        <?php get_footer(); ?>
	</div>


    <script>

        var $ = jQuery.noConflict();

        /*$(".nav-bottom ul.right-data-list li").on("click", function(e) {
            e.stopPropagation();
            // e.preventDefault();
            var $current = $(this);
            $current.addClass("active").siblings("li.active").removeClass("active");
        });*/

        jQuery(document).ready(function() {
            jQuery(".spinner").fadeOut();
            jQuery("body").removeClass("spinner-scroll");

            var playwrapper = jQuery('.play-pause-wrapper');
            var video = jQuery("video#myVideo");
            var videoOverlay =  jQuery(".video-text-layer");
            var layer =  jQuery(".we-are-overlay");

            jQuery(playwrapper).on('click', function(e){
                video.get(0).play();
                videoOverlay.fadeOut();
                layer.fadeOut();
            });

            video.on('click', function(e){
                video.get(0).pause();
                videoOverlay.fadeIn();
                layer.fadeIn();
            });
        })




        function validateFormOnSubmit(contact) {
            reason = "";
            reason += validateEmpty(contact.name);
            reason += validateEmail(contact.email);
            reason += validatePhone(contact.phone);

            console.log(reason);
            if (reason.length > 0) {

                return false;
            } else {
              sendEmail()
            }
        }
        function sendEmail(){
            $("input, button, textarea").prop("disabled","disabled");
            // debugger;
            var name = $("#name").val();
            var email = $("#email").val();
            var info = $("#info").val();
            var contact=$("#phone").val();
            $.ajax({
                url: 'https://www.imaginea.com/design/wp-content/themes/imaginea/inc/mailLogic/sendEmailUser.php',
                type: 'POST',
                data: {
                    'post_name' : name,
                    'post_email' : email,
                    'post_info' : info,
                    'post_contact' : contact
                },
                success: function(data) {

                    triggerToAdmin();
                },
                error: function(e) {

                    console.log(e.message);
                }
            });
            return false;
        }

        function triggerToAdmin(){
            var name = $("#name").val();
            var email = $("#email").val();
            var info = $("#info").val();
            var contact=$("#phone").val();
            $.ajax({
                url: 'https://www.imaginea.com/design/wp-content/themes/imaginea/inc/mailLogic/sendEmailAdmin.php',
                type: 'POST',
                data: {
                    'post_name' : name,
                    'post_email' : email,
                    'post_info' : info,
                    'post_contact' : contact
                },
                success: function(data) {

                    $(".newsletter-sub .content").empty();
                    $(".newsletter-sub .content").append("<br/><br/><h4>Thank you for your interest in Imaginea Design Labs!<h4>");
                },
                error: function(e) {
                    console.log(e.message);
                }
            });
        }

        // validate required fields
        function validateEmpty(name) {
            var error = "";

            if (name.value.length == 0) {
                $(".name-error").text("The required field has not been filled in");
                var error = "1";
            } else {
                $(".name-error").text('');
            }
            return error;
        }


        // validate email as required field and format
        function trim(s) {
            return s.replace(/^\s+|\s+$/, '');
        }

        function validateEmail(email) {
            var error = "";
            var temail = trim(email.value); // value of field with whitespace trimmed off
            var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
            var illegalChars = /[\(\)\<\>\,\;\:\\\"\[\]]/;

            if (email.value == "") {
                $('.email-error').text("Please enter an email address.");
                var error = "2";
            } else if (!emailFilter.test(temail)) { //test email for illegal characters
                $('.email-error').text("Please enter a valid email address.");
                var error = "3";
            } else if (email.value.match(illegalChars)) {
                var error = "4";
                $('.email-error').text("Email contains invalid characters.");
            } else {
                $('.email-error').text('');
            }
            return error;
        }

        // validate phone for required and format
        function validatePhone(phone) {
            var error = "";
            var stripped = phone.value.replace(/[\(\)\.\-\ ]/g, '');

            if (phone.value == "") {
               $('.test').text("Please enter a phone number");
                var error = '6';
            } else if (isNaN(parseInt(stripped))) {
                var error = "5";
                $('.test').text("The phone number contains illegal characters.");
            } else if (stripped.length < 10) {
                var error = "6";
               $('.test').text("The phone number is too short.");
            } else {
                $('.test').text('');
            }
            return error;
        }

    </script>
</body>
</html>
