<!-- js -->
<script src="<?php echo $config['BASED_URL'] ?>/vendors/scripts/core.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/vendors/scripts/script.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/vendors/scripts/process.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/vendors/scripts/layout-settings.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/vendors/scripts/dashboard3.js"></script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>-->

<script>
    $(function () {

        if (localStorage.getItem('staff') == null) {
            window.location.href = "<?php echo $config['BASED_URL'] . '/login.php' ?>";
        }

//        $('form.staff-add-form').validate({
//            rules: {
//                name: {
//                    required: true,
//                    minlength: 2
//                },
//                email: {
//                    required: true,
//                    email: true
//                }
//            },
//            messages: {
//                name: {
//                    required: "Please enter your name.",
//                    minlength: "Name must be at least 2 characters long."
//                },
//                email: {
//                    required: "Please enter your email address.",
//                    email: "Please enter a valid email address."
//                }
//            },
//            submitHandler: function (form) {
//                // Function na ito ang tatawagin kapag ang form ay wasto na na-validate
//                var $form = $(form);
//                $.ajax({
//                    type: $form.attr('method'),
//                    url: "<?php echo $config['SERVER_HOST'] . '/tenants' ?>",
//                    data: $form.serialize(),
//                    dataType: "json",
//                }).done(function (data) {
//                    $form[0].reset();
//                    $('#error-handler').html('<p class="error">Successfully added.</p>');
//                }).fail(function (err) {
//                    console.log(err);
//                    $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
//                });
//            }
//        });


        $('form.staff-add-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);

            var pass = $('#password').val();
            var confPass = $('#confirmPassword').val();

            if (pass != confPass) {
                $('#error-handler').html('<p class="error">Password not match.</p>');
                return false;
            }

            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/tenants' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                form[0].reset();
                $('#error-handler').html('<p class="error">Successfully added.</p>');
            }).fail(function (err) {
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.staff-edit-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser

            var tenantId = "<?php echo isset($_GET['tenantId']) ? $_GET['tenantId'] : null; ?>";

            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/tenants/' ?>" + tenantId,
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                $('#error-handler').html('<p class="error">Successfully updated.</p>');
            }).fail(function (err) {
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.room-add-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/rooms' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                form[0].reset();
                $('#error-handler').html('<p class="success">Successfully added.</p>');
            }).fail(function (err) {
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.room-edit-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser

            var id = "<?php echo isset($_GET['roomId']) ? $_GET['roomId'] : null; ?>";

            var form = $(this);
            $.ajax({
                type: 'PATCH',
                url: "<?php echo $config['SERVER_HOST'] . '/rooms/' ?>" + id,
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                localStorage.setItem('roomInfo', null);
                $('#error-handler').html('<p class="success">Successfully updated.</p>');
            }).fail(function (err) {
                console.log(err);
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('#dt').DataTable({
            'pageLength': 10,
            'bLengthChange': false,
            'sorting': false,
            'filter': true,
            'sorting': true,
            'autoWidth': true,
            dom: 'Bfrtip',
            retrieve: true,
        });
    });

    let rooms = localStorage.getItem('roomList') != null ? JSON.parse(localStorage.getItem('roomList')) : [];
    let roomInfo = localStorage.getItem('roomInfo') != null ? JSON.parse(localStorage.getItem('roomInfo')) : [];

    function roomList() {
        $.ajax({
            type: "GET",
            url: "<?php echo $config['SERVER_HOST'] . '/rooms' ?>",
            dataType: "json",
        }).done(function (res) {
            localStorage.setItem('roomList', JSON.stringify(res));
        }).fail(function (err) {
            console.log(err)
        });
    }
    roomList();

    function roomEdit() {

        var id = "<?php echo isset($_GET['roomId']) ? $_GET['roomId'] : null; ?>";

        console.log(id);
        console.log(rooms);
        console.log(roomInfo);

        for (var i = 0; i <= rooms.length; i++) {

            if (rooms[i]['id'] == id) {

                localStorage.setItem('roomInfo', JSON.stringify(rooms[i]));

                $('input[name="roomCode"]').val(roomInfo['roomCode']);
                $('input[name="buildingCode"]').val(roomInfo['buildingCode']);
                $('input[name="hasKitchen"]').val(roomInfo['hasKitchen']);
                $('input[name="maxTenantCapacity"]').val(roomInfo['maxTenantCapacity']);
                $('input[name="numberOfBedrooms"]').val(roomInfo['numberOfBedrooms']);
                $('input[name="numberOfFloors"]').val(roomInfo['numberOfFloors']);
                $('input[name="ratePerMonth"]').val(roomInfo['ratePerMonth']);
                $('input[name="hasBathroomComfortRoom"]').val(roomInfo['hasBathroomComfortRoom']);
            }
        }
    }
    //roomEdit();

    function setSessionRedirect(variable, value, link) {
        sessionStorage.setItem(variable, value);
        window.location.href = link;
        console.log(variable);
    }

    function logout() {
        localStorage.clear();
        window.location.href = "<?php echo $config['BASED_URL'] . '/login.php' ?>";
    }

    function assignTo(tenantId) {
        var roomId = "<?php echo isset($_GET['roomId']) ? $_GET['roomId'] : null; ?>";

        $.ajax({
            type: 'PATCH',
            url: "<?php echo $config['SERVER_HOST'] . '/rooms/assign' ?>",
            data: {
                roomId: roomId,
                tenantId: tenantId
            },
            dataType: "json",
        }).done(function (data) {
            console.log(data);
            $('#error-handler').html('<p class="success">Successfully updated.</p>');
        }).fail(function (err) {
            console.log(err);
            $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
        });
    }

    function unassignFrom(roomId) {
        $.ajax({
            type: 'PATCH',
            url: "<?php echo $config['SERVER_HOST'] . '/rooms/unassign' ?>",
            data: {
                roomId: roomId,
            },
            dataType: "json",
        }).done(function (data) {
            location.reload();
        }).fail(function (err) {
            console.log(err);
            $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
        });
    }

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
<noscript
    ><iframe
    src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
    height="0"
    width="0"
    style="display: none; visibility: hidden"
    ></iframe
></noscript>
<!-- End Google Tag Manager (noscript) -->