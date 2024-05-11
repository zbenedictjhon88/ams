<!DOCTYPE html>
<html>
    <head>
        <?php include 'includes/_head.php'; ?>
    </head>
    <body>
        <!--Pre loader-->
        <?php include 'includes/_preLoader.php'; ?>

        <!--Header-->
        <?php include 'includes/_header.php'; ?>

        <!--Theme setting-->
        <?php include 'includes/_themeSetting.php'; ?>

        <!--Side bar-->
        <?php include 'includes/_sideBar.php'; ?>

        <div class="mobile-menu-overlay"></div>

        <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>View Room</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Room Management</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        View Room
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row mt-15">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover">
                                    <?php
                                        $apiUrl = $config['SERVER_HOST'] . '/rooms/' . $_GET['roomId'];
                                        $response = file_get_contents($apiUrl);
                                        $data = json_decode($response, true);
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td>Room No:</td>
                                            <td><?= $data['roomCode'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Room Type:</td>
                                            <td><?= $data['roomType'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Rate Per Month:</td>
                                            <td><?= $data['ratePerMonth'] ?></td>
                                        </tr>

                                        <?php if(!isset($data['assignedTo'])): ?>
                                                <tr>
                                                    <td>Assign To(Tenant):</td>
                                                    <td>
                                                        <select class="form-control" onchange="assignTo(this.value);">
                                                            <option>Choose One</option>
                                                            <?php
                                                            $apiUrl = $config['SERVER_HOST'] . '/tenants';
                                                            $response = file_get_contents($apiUrl);
                                                            $data = json_decode($response, true);
                                                            for($i = 0; $i < count($data); $i++) {
                                                                echo '<option value="' . $data[$i]['id'] . '">' . $data[$i]['firstName'] . ' ' . $data[$i]['lastName'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>

                                                        <div id="error-handler"></div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                    </tbody>
                                </table>
                                <a class="btn btn-dark" href="<?php echo $config['BASED_URL'] . '/app/staff/rooms.php' ?>">BACK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer-->
        <?php include 'includes/_footer.php'; ?>
    </body>
</html>