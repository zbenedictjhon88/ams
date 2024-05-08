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
                                <h4>Update Room</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Update Room
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form class="room-edit-form" method="PATCH" action="#">
                                    <h1> Update Room</h1>
                                    <br>

                                    <div id="error-handler"></div>

                                    <fieldset>
                                        <!--<input id="room_id" type="hidden" value="<?php echo $_GET['room_id'] ?>" />-->

                                        <label class="required"><span></span>Room Code:</label>
                                        <input type="text" name="roomCode" placeholder="Room Code" value="" required>

                                        <label class="required"><span></span>Building Code:</label>
                                        <input type="text" name="buildingCode" placeholder="Building Code" required>

                                        <label class="required">With Kitchen?:</label>
                                        <div class="gender-selection" required>
                                            <input type="radio"  name="hasKitchen" value="0" selected>
                                            <label for="male">No</label>
                                            <input type="radio"  name="hasKitchen" value="1">
                                            <label for="female">Yes</label>
                                        </div>
                                        <br />

                                        <label class="required"><span></span>Max Tenant Capacity:</label>
                                        <input type="text" name="maxTenantCapacity" placeholder="Max Tenant Capacity" required>

                                        <label class="required"><span></span>Number Of Bedrooms:</label>
                                        <input type="text" name="numberOfBedrooms" placeholder="Number Of Bedrooms" required>

                                        <label class="required"><span></span>Number Of Floors:</label>
                                        <input type="text" name="numberOfFloors" placeholder="Number Of Floors" required>

                                        <label class="required"><span></span>Rate Per Month:</label>
                                        <input type="text" name="ratePerMonth" placeholder="Rate Per Month" required>

                                        <label class="required">With Bathroom Comfort Room?:</label>
                                        <div class="gender-selection" required>
                                            <input type="radio"  name="hasBathroomComfortRoom" value="0">
                                            <label for="male">No</label>
                                            <input type="radio"  name="hasBathroomComfortRoom" value="1">
                                            <label for="female">Yes</label>
                                        </div>
                                        <br />

                                        <label class="required"><span></span>Assign To(Tenant):</label>
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

                                    </fieldset>
                                    <button type="submit" id="sign" name="sign">Update</button>
                                    <a class="btn btn-dark btn-block" href="<?php echo $config['BASED_URL'] . '/app/staff/rooms.php' ?>">BACK</a>
                                </form>
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