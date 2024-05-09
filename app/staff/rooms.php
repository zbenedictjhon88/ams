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
                                <h4>Room Management</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Room Management
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <br />
                                <div class="table-responsive-sm">
                                    <table id="dt" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Room Code</th>
                                                <th>Building Code</th>
                                                <th>Rate Per Month</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $apiUrl = $config['SERVER_HOST'] . '/rooms';
                                                $response = file_get_contents($apiUrl);
                                                $data = json_decode($response, true);
                                                for($i = 0; $i < count($data); $i++) {
                                                    $data[$i]['isOccupied'] = $data[$i]['isOccupied'] == false ? '<span class="alert alert-success">Vacant</span>' : '<span class="alert alert-danger">Occupied</span>';
                                                    echo '<tr>'
                                                    . '<td>' . $data[$i]['roomCode'] . '</td>'
                                                    . '<td>' . $data[$i]['buildingCode'] . '</td>'
                                                    . '<td>' . $data[$i]['ratePerMonth'] . '</td>'
                                                    . '<td>' . $data[$i]['isOccupied'] . '</td>'
                                                    . '<td>'
                                                    . '<a class="btn btn-info btn-sm" href="' . $config['BASED_URL'] . '/app/staff/updateRoom.php?roomId=' . $data[$i]['id'] . '"><i class="fa fa-edit"></i></a> '
                                                    . '<a class="btn btn-danger btn-sm" href="' . $config['BASED_URL'] . '/app/staff/deleteRoom.php?roomId=' . $data[$i]['id'] . '"><i class="fa fa-trash"></i></a>'
                                                    . '</td>'
                                                    . '</tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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