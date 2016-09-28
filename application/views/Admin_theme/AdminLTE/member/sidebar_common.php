<!-- Sidebar Menu -->
<ul class="sidebar-menu">
    <li class="header">Main Sidebar</li>
    <!-- Optionally, you can add icons to the links -->

    <li class="active"><a href="<?= site_url('userdashboard'); ?>"><i class="fa fa-tachometer"></i> <span>User Dashboard</span></a></li>


    
    
    
    <li><a href="<?= site_url('user'); ?>"><i class="fa fa-cogs"></i> <span>Profile</span></a></li>
    

    <li><a href="<?= site_url('userdashboard'); ?>"><i class="fa fa-search"></i> <span>Search Your Items</span></a></li>
    <li><a href="<?= site_url('circulation/userissuetable?link=pending_request'); ?>"><i class="fa fa-book"></i> <span>My Requested Book</span></a></li>
    <li><a href="<?=site_url('circulation/userissuetable')?>"><i class="fa fa-retweet"></i> <span>My Circulation History</span></a></li>
    <li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
</ul>