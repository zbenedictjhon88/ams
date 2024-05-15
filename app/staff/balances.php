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
                                <h4>Balances</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Balances
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
                                                <th>Tenant Name</th>
                                                <th>Room No</th>
                                                <th>Amopunt Due</th>
                                                <th>Due DAte</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $balanceUrl = $config['SERVER_HOST'] . '/balance';
                                                $balanceResponse = file_get_contents($balanceUrl);
                                                $balanceData = json_decode($balanceResponse, true);

                                                for($i = 0; $i < count($balanceData); $i++) {

                                                    $roomUrl = $config['SERVER_HOST'] . '/rooms/' . $balanceData[$i]['roomId'];
                                                    $roomResponse = file_get_contents($roomUrl);
                                                    $roomData = json_decode($roomResponse, true);

                                                    $isPaid = $balanceData[$i]['isPaid'] == 0 ? '' : 'Paid';

                                                    $dateTime = DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $balanceData[$i]['dueDate']);

                                                    echo '<tr>'
                                                    . '<td>' . $balanceData[$i]['tenantName'] . '</td>'
                                                    . '<td>' . $roomData['roomCode'] . '</td>'
                                                    . '<td>' . $balanceData[$i]['amountDue'] . '</td>'
                                                    . '<td>' . $dateTime->format('F j, Y, g:i A') . '</td>'
                                                    . '<td>' . $isPaid . '</td>'
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