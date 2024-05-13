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
        
        if (localStorage.getItem('tenant') == null) {
            window.location.href = "<?php echo $config['BASED_URL'] . '/index.php' ?>";
        }

        $('form.staff-add-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);
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

        $('#dt').DataTable({
            'pageLength': 10,
            'bLengthChange': false,
            'sorting': false,
            'filter': true,
            'sorting': false,
            autoWidth: true,
            dom: 'Bfrtip',
            retrieve: true,
        });
    });


    function roomList() {

        $('#dt').DataTable().clear().destroy();
        $.ajax({
            type: "GET",
            url: "<?php echo $config['SERVER_HOST'] . '/rooms' ?>",
            dataType: "json",
        }).done(function (res) {
            console.log(res)
            for (var i = 1; i <= res.length; res++) {
                $('#room-list').append('<tr>' +
                        '<td>' + i + '</td>' +
                        '<td>' + res[i]['roomCode'] + '</td>' +
                        '<td>' + res[i]['buildingCode'] + '</td>' +
                        '<td>' + res[i]['isOccupied'] + '</td>' +
                        '<td>' + res[i]['ratePerMonth'] + '</td>' +
                        '<td>' +
                        //'<a href="<?php echo $config['BASED_URL'] . '/app/staff/viewRoom.php' ?>">View</a> ' +
                        '<a href="<?php echo $config['BASED_URL'] . '/app/staff/updateRoom.php' ?>">Update</a> ' +
                        '<a href="<?php echo $config['BASED_URL'] . '/app/staff/viewRoom.php' ?>">Delete</a> ' +
                        '<a onclick="setSessionRedirect("roomEdit", "' + res + '", "<?php echo $config['BASED_URL'] . '/app/staff/updateRoom.php' ?>")">Update</a> ' +
                        '</td>' +
                        '</tr>')
            }
        }).fail(function (err) {
            console.log(err)
        });
    }
    roomList();

    function setSessionRedirect(variable, value, link) {
        sessionStorage.setItem(variable, value);
        window.location.href = link;
        console.log(variable);
    }

    function logout() {
        localStorage.clear();
        window.location.href = "<?php echo $config['BASED_URL'] . '/index.php' ?>";
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