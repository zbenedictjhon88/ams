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
    });
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