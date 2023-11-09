<?php // function to get the current page name
function PageName() {
  return substr( $_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/") +1);
}

$current_page = PageName();
?>
<div class="sidebar sidebar-style-2 bg-dark-gradient">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            
            <ul class="nav nav-primary">
                <!-- dashboard -->
                <li class="nav-item <?= $current_page=='dashboard.php' || $current_page=='dashboard_announcement_detail.php' ? 'active' : null ?>">
                    <a href="dashboard.php" >
                        <i class="fas"><img style="width: 30px; height: 30px;" src="icon/dashboard.png"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- end of dashboard -->


                <!-- reocords -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">FOR CHILDREN</h4>
                </li>
                        <li class="nav-item <?= $current_page=='deworming-add.php' ? 'active' : null ?>">
                            <a href="deworming-add.php" >
                            <i class="fas"><img style="width: 30px; height: 30px;" src="icon/add.png"></i>          
                                <p>Add Record</p>
                            </a>
                        </li>
                        <li class="nav-item <?= $current_page=='deworming.php' ? 'active' : null ?>">
                            <a href="deworming.php" >
                            <i class="fas"><img style="width: 30px; height: 30px;" src="icon/list.png"></i>
                                <p>Records</p>
                            </a>
                        </li>
                        
                <!-- system maintenance -->
                <?php if(isset($_SESSION['username']) && $_SESSION['role']=='system-maintenance'): ?>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">SYSTEM MAINTENANCE</h4>
                </li>
                        <!-- manage users -->
                        <li class="nav-item <?= $current_page=='manage-user.php' || $current_page=='manage_user_add_form.php' ? 'active': null ?>">
                            <a href="manage-user.php" >
                                <i class="fa"><img style="width: 30px; height: 30px;" src="icon/management.png"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <?php endif ?>
                <!-- end of system maintenance -->


                <!-- sign out -->
                <li class="nav-item" style="margin-top: 50px;">
                    <a href="model/logout.php">
                    <i class="fas"><img style="width: 30px; height: 30px;" src="icon/log-out.png"></i>
                        <p>Logged Out</p>
                    </a>
                </li>
                <!-- end of sign out -->

            </ul>
        </div>
    </div>
</div>
<style>
    .sidebar.sidebar-style-2 .nav.nav-primary > .nav-item.active > a {
        background-color: #336699 !important;
    }
</style>