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
                                <h4>Add Tenant</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Add tenant
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form class="staff-add-form" method="post" action="#">
                                    <h1> Register New Tenant</h1><br>

                                    <div id="error-handler"></div>

                                    <fieldset>
                                        <label for="last" class="required"><span></span>Last name:</label>
                                        <input type="text" id="last_name" name="firstName" placeholder="Last name:" required>

                                        <label for="first" class="required">First name:</label>
                                        <input type="text" id="first_name" name="lastName" placeholder="First name:" required>

                                        <label for="middle">Middle name:</label>
                                        <input type="text" id="mid_name" name="middleName" placeholder="Middle name (Optional)">

                                        <label for="gender" class="required">Gender:</label>
                                        <div class="gender-selection" required>
                                            <input type="radio" id="male" name="gender" value="Male">
                                            <label for="male">Male</label>

                                            <input type="radio" id="female" name="gender" value="Female">
                                            <label for="female">Female</label>
                                        </div>
                                        <br>

                                        <label for="Contact" class="required">Contact Number:</label>
                                        <input type="tel" name="contact" id="cnum" placeholder="+63" maxLegnth="11" required>

                                        <label for="address" class="required">Address:</label>
                                        <input type="text" id="region" name="addressBefore"  >

                                        <label for="email" class="required">Email:</label>
                                        <input type="text" id="email" name="email"  required>

                                        <label for="password" class="required">Password:</label>
                                        <input class="form-inputs" type="password"  id="pwd"  name="password" required>
                                    </fieldset>
                                    <button type="submit" id="sign" name="sign">Sign-up</button>
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