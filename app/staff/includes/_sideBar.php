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
                <li>
                    <a href="<?php echo $config['BASED_URL'] . '/app/staff/dashboard.php' ?>" class="dropdown-toggle no-arrow <?php echo $config['ACTIVE_LINK'] == "dashboard" ? "active" : "" ?>">
                        <span class="micon bi bi-list"></span
                        ><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <?php $ten = array('addTenant', 'tenants') ?>
                    <a href="javascript:;" class="dropdown-toggle <?php echo in_array($config['ACTIVE_LINK'], $ten) ? "active" : "" ?>">
                        <span class="micon fa fa-users"></span
                        ><span class="mtext">Tenant Section</span>
                    </a>
                    <ul class="submenu">
                        <li><a class="<?php echo $config['ACTIVE_LINK'] == "addTenant" ? "active" : "" ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/addTenant.php' ?>">Add Tenant</a></li>
                        <li><a class="<?php echo $config['ACTIVE_LINK'] == "tenants" ? "active" : "" ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/tenants.php' ?>">Tenant Management</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <?php $roo = array('addRoom', 'rooms') ?>
                    <a href="javascript:;" class="dropdown-toggle <?php echo in_array($config['ACTIVE_LINK'], $roo) ? "active" : "" ?>">
                        <span class="micon bi bi-house"></span
                        ><span class="mtext">Room Section</span>
                    </a>
                    <ul class="submenu">
                        <li><a class="<?php echo $config['ACTIVE_LINK'] == "addRoom" ? "active" : "" ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/addRoom.php' ?>">Add Room</a></li>
                        <li><a class="<?php echo $config['ACTIVE_LINK'] == "rooms" ? "active" : "" ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/rooms.php' ?>">Room Management</a></li>
                    </ul>
                </li>
                <li hidden>
                    <a href="invoice.php" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-receipt-cutoff"></span
                        ><span class="mtext">Invoice</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>