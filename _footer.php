<!-- js -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>

<script>
    $(function () {

        $('form.staff-login-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/staffs/sign-in' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                localStorage.setItem('staff', JSON.stringify(data));
                window.location.href = "<?php echo $config['BASED_URL'] . '/app/staff/dashboard.php' ?>";
            }).fail(function (err) {
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.tenant-login-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser 
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/tenants/sign-in' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                localStorage.setItem('tenant', JSON.stringify(data));
                window.location.href = "<?php echo $config['BASED_URL'] . '/app/tenant/dashboard.php' ?>";
            }).fail(function (err) {
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.forgot-password-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser 
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/tenants/forgot-password' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                $('#error-handler').html('<p class="success">Please check your email to reset your password. Thank you!</p>');
            }).fail(function (err) {
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.reset-password-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser 
            var form = $(this);
            var token = "<?php echo isset($_GET['token']) ? $_GET['token'] : null ?>";

            var pass = $('#password').val();
            var confPass = $('#confirmPassword').val();

            if (pass != confPass) {
                $('#error-handler').html('<p class="error">Password not match.</p>');
                return false;
            }

            $.ajax({
                type: "PATCH",
                url: "<?php echo $config['SERVER_HOST'] . '/tenants/reset-password' ?>",
                data: {
                    token: token,
                    newPassword: pass
                },
                dataType: "json",
            }).done(function (data) {
                $('#error-handler').html('<p class="success">Please check your email to reset your password. Thank you!</p>');
            }).fail(function (err) {
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });
    });

    function showPassword(elementId) {
        var currentType = $("#" + elementId).attr("type");
        if (currentType === "password") {
            $("#" + elementId).attr("type", "text");
        } else {
            $("#" + elementId).attr("type", "password");
        }
    }

    function checkPasswordStrength(password) {

        var passwordStatus = "(weak)";

        // Min and max length for password
        var minLength = 8;
        var maxLength = 20;

        // Check length
        if (password.length < minLength || password.length > maxLength) {
            passwordStatus = "(weak)";
            $('#passwordStatus').addClass("font-danger");
        }


        var uppercaseRegex = /[A-Z]/;
        var lowercaseRegex = /[a-z]/;
        var numberRegex = /[0-9]/;
        var specialCharRegex = /[^A-Za-z0-9]/;

        if (uppercaseRegex.test(password) && lowercaseRegex.test(password) && numberRegex.test(password) && specialCharRegex.test(password)) {
            passwordStatus = "(strong)";
            $('#passwordStatus').addClass("font-success");
        } else if ((uppercaseRegex.test(password) && lowercaseRegex.test(password)) || (uppercaseRegex.test(password) && numberRegex.test(password)) || (uppercaseRegex.test(password) && specialCharRegex.test(password)) || (lowercaseRegex.test(password) && numberRegex.test(password)) || (lowercaseRegex.test(password) && specialCharRegex.test(password)) || (numberRegex.test(password) && specialCharRegex.test(password))) {
            passwordStatus = "(medium)";
            $('#passwordStatus').addClass("font-info");
        } else {
            passwordStatus = "(weak)";
            $('#passwordStatus').addClass("font-danger");
        }

        $('#passwordStatus').text(passwordStatus);
    }
</script>

<!-- Google Tag Manager (noscript) -->
<noscript>
<iframe
    src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
    height="0"
    width="0"
    style="display: none; visibility: hidden"
    ></iframe 
</noscript>
<!-- End Google Tag Manager (noscript) -->