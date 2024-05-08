<div class="left-side-bar">
    <div class="brand-logo">
        <a>
            <img src="<?php echo $config['BASED_URL'] ?>/assets/img/AMS.png" width="100" height="100">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <?php $dashArr = array('dashboard', 'addTenant', 'addRoom') ?>
                    <a href="javascript:;" class="dropdown-toggle <?php echo in_array($config['ACTIVE_LINK'], $dashArr) ? "active" : "" ?>">
                        <span class="micon bi bi-house"></span
                        ><span class="mtext">Home</span>
                    </a>
                    <ul class="submenu">
                        <li><a class="<?php echo $config['ACTIVE_LINK'] == "dashboard" ? "active" : "" ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/dashboard.php' ?>">Dashboard</a></li>
                        <li><a class="<?php echo $config['ACTIVE_LINK'] == "addTenant" ? "active" : "" ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/addTenant.php' ?>">Add Tenant</a></li>
                        <li><a class="<?php echo $config['ACTIVE_LINK'] == "addRoom" ? "active" : "" ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/addRoom.php' ?>">Add Room</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <?php $manArr = array('rooms', 'tenants') ?>
                    <a href="javascript:;" class="dropdown-toggle <?php echo in_array($config['ACTIVE_LINK'], $manArr) ? "active" : "" ?>">
                        <span class="micon bi bi-calendar4-week"></span
                        ><span class="mtext">Management</span>
                    </a>
                    <ul class="submenu">
                        <li><a class="<?php echo $config['ACTIVE_LINK'] == "rooms" ? "active" : "" ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/rooms.php' ?>">Rooms</a></li>
                        <li><a class="<?php echo $config['ACTIVE_LINK'] == "tenants" ? "active" : "" ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/tenants.php' ?>">Tenant</a></li>
                    </ul>
                </li>
                <li hidden>
                    <a href="invoice.php" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-receipt-cutoff"></span
                        ><span class="mtext">Invoice</span>
                    </a>
                </li>
                <li>
            </ul>
        </div>
    </div>
</div>