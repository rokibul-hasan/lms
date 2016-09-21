<!-- Sidebar Menu -->
<ul class="sidebar-menu">
    <li class="header">Main Sidebar</li>
    <!-- Optionally, you can add icons to the links -->

    <li class="active"><a href="<?= site_url('Admin'); ?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
    <li><a href="<?= site_url('Technician'); ?>"><i class="fa fa-cogs"></i> <span>General Settings</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Book</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= site_url('Performance/technician'); ?>"><i class="fa fa-list"></i> Book Category</a></li>
            <li><a href="<?= site_url('Performance/supplier'); ?>"><i class="fa fa-book"></i> Book</a></li>            
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-pencil"></i> <span>Author</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= site_url('Performance/technician'); ?>"><i class="fa fa-pencil"></i> Author</a></li>
            <li><a href="<?= site_url('Performance/supplier'); ?>"><i class="fa fa-list-alt"></i> Author Type</a></li>            
        </ul>
    </li>
    <li><a href="<?= site_url('Technician'); ?>"><i class="fa fa-cogs"></i> <span>Publishers</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-newspaper-o"></i> <span>Journal</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= site_url('Performance/technician'); ?>"><i class="fa fa-newspaper-o"></i> Journal</a></li>
            <li><a href="<?= site_url('Performance/supplier'); ?>"><i class="fa fa-copy"></i> Journal Copy</a></li>            
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-graduation-cap"></i> <span>Thesis</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= site_url('Performance/technician'); ?>"><i class="fa fa-graduation-cap"></i> Thesis</a></li>
            <li><a href="<?= site_url('Performance/supplier'); ?>"><i class="fa fa-copy"></i> Thesis Copy</a></li>            
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-retweet"></i> <span>Circulation</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= site_url('Performance/technician'); ?>"><i class="fa fa-cog"></i> Circulation Settings</a></li>
            <li><a href="<?= site_url('Performance/supplier'); ?>"><i class="fa fa-exchange"></i> Issue &amp; Return</a></li>            
        </ul>
    </li>
    <li><a href="<?= site_url('Performance/supplier'); ?>"><i class="fa fa-folder-open"></i> <span>Daily Read Books</span></a></li>
    <li><a href="<?= site_url('Performance/supplier'); ?>"><i class="fa  fa-inbox"></i> <span>Requested Books</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-user"></i> <span>Member</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a> 
        <ul class="treeview-menu">
            <li><a href="http://lms.xeroneit.net/admin/config_member_type"><i class="fa fa-user"></i> <span>Member Type</span></a></li>
            <li><a href="http://lms.xeroneit.net/admin/config_member"><i class="fa fa-group"></i> <span>Member</span></a></li>
            <li><a href="http://lms.xeroneit.net/admin/generate_id"><i class="fa fa-credit-card"></i> <span>Generate member ID</span></a></li>
        </ul>
    </li> 
    <li class="treeview">
        <a href="#">
            <i class="fa fa-file-pdf-o"></i>
            <span>Report</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a> 
        <ul class="treeview-menu">
            <li><a href="http://lms.xeroneit.net/report/index"><i class="fa fa-money"></i> <span>Fine/Penalty Report</span></a></li>
            <li><a href="http://lms.xeroneit.net/report/notification_report"><i class="fa fa-envelope-o"></i> <span>Notification Report</span></a></li>         
        </ul>
    </li>
    <li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
</ul>
<!-- /.sidebar-menu -->