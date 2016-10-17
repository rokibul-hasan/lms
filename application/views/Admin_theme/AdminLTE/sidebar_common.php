<!-- Sidebar Menu -->
<ul class="sidebar-menu">
    <li class="header">Main Sidebar</li>
    <!-- Optionally, you can add icons to the links -->

    <li class="active"><a href="<?= site_url('Admin'); ?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
    <li><a href="<?= site_url('about'); ?>"><i class="fa fa-cogs"></i> <span>Front Page Settings</span></a></li>

        <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Libraries Essentials</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            

            
            
    <li class="treeview">
        <a href="#"><i class="fa fa-pencil"></i> <span>Author</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= site_url('author'); ?>"><i class="fa fa-pencil"></i> Author</a></li>
            <li><a href="<?= site_url('author/author_type'); ?>"><i class="fa fa-list-alt"></i> Author Type</a></li>            
        </ul>
    </li>
    
    <li><a href="<?= site_url('publisher'); ?>"><i class="fa fa-paperclip"></i> <span>Publishers</span></a></li>
                 <li class="treeview">
                <a href="#"><i class="fa fa-book"></i> <span>Book</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= site_url('book'); ?>"><i class="fa fa-book"></i> Book</a></li>       
                    <li><a href="<?= site_url('book/bookauthor'); ?>"><i class="fa fa-pencil"></i> Book Author</a></li>       
                    <li><a href="<?= site_url('book/book_category'); ?>"><i class="fa fa-list"></i> Book Category</a></li>
                    <li><a href="<?= site_url('book/book_type'); ?>"><i class="fa fa-repeat"></i> Book type</a></li>
                    <li><a href="<?= site_url('book/book_copy'); ?>"><i class="fa fa-copy"></i> Book Copy</a></li>
                    <li><a href="<?= site_url('book/book_include'); ?>"><i class="fa fa-adjust"></i> Book Include</a></li>                  
                         
                </ul>
            </li>
            
        <li class="treeview">
        <a href="#"><i class="fa fa-newspaper-o"></i> <span>Journal</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= site_url('journal'); ?>"><i class="fa fa-newspaper-o"></i> Journal</a></li>
            <li><a href="<?= site_url('journal/journal_copy'); ?>"><i class="fa fa-copy"></i> Journal Copy</a></li>            
            <li><a href="<?= site_url('journal/journal_category'); ?>"><i class="fa fa-list"></i> Journal Category</a></li>            
            <li><a href="<?= site_url('journal/journal_include'); ?>"><i class="fa fa-adjust"></i> Journal Include</a></li>            
        </ul>
    </li>
    
    
        <li class="treeview">
        <a href="#"><i class="fa fa-graduation-cap"></i> <span>Thesis</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= site_url('thesis'); ?>"><i class="fa fa-graduation-cap"></i> Thesis</a></li>
            <li><a href="<?= site_url('thesis/thesis_copy'); ?>"><i class="fa fa-copy"></i> Thesis Copy</a></li>            
            <li><a href="<?= site_url('thesis/thesis_category'); ?>"><i class="fa fa-list"></i> Thesis Category</a></li>            
            <li><a href="<?= site_url('thesis/thesis_author'); ?>"><i class="fa fa-pencil"></i> Thesis Author</a></li>            
            <li><a href="<?= site_url('thesis/thesis_supervisor'); ?>"><i class="fa fa-user"></i> Thesis Supervisor</a></li>            
        </ul>
    </li>
    
    
        <li class="treeview">
        <a href="#">
            <i class="fa fa-file-pdf-o"></i> <span>Reports</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a> 
        <ul class="treeview-menu">
            <li><a href="<?= site_url('report'); ?>"><i class="fa fa-graduation-cap"></i> Reports</a></li>
            <li><a href="<?= site_url('report/reportssubject'); ?>"><i class="fa fa-list"></i> Reports Category</a></li>           
            <li><a href="<?= site_url('report/report_copy'); ?>"><i class="fa fa-copy"></i> Reports Copy</a></li>           
        </ul>
    </li>
            
            
        </ul>
    </li>
    
    <?php if($_SESSION['user_type'] != 3) { ?>
    
   

    <li class="treeview">
        <a href="#"><i class="fa fa-retweet"></i> <span>Circulation</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= site_url('circulation/'); ?>"><i class="fa fa-cog"></i> Circulation Settings</a></li>
            <li><a href="<?= site_url('circulation/fine_calculation'); ?>"><i class="fa fa-calculator"></i> Fine Calculation</a></li>
            <li><a href="<?= site_url('circulation/book_issue'); ?>"><i class="fa fa-mail-forward"></i> Issue </a></li>            
            <li><a href="<?= site_url('circulation/book_return'); ?>"><i class="fa fa-mail-reply"></i> Return</a></li>            
            <li><a href="<?= site_url('circulation/issuetable'); ?>"><i class="fa fa-table"></i> Issue & Return Table</a></li>            
        </ul>
    </li>
    <li><a href="<?= site_url('admin/daily_read_book'); ?>"><i class="fa fa-folder-open"></i> <span>Daily Read Resources</span></a></li>
    <li><a href="<?= site_url('admin/top_book'); ?>"><i class="fa fa-book"></i> <span>Top Resources</span></a></li>
    <!--<li><a href="<?= site_url('admin/supplier'); ?>"><i class="fa  fa-inbox"></i> <span>Requested Resources</span></a></li>-->
     <li><a href="<?= site_url('event'); ?>"><i class="fa  fa-calendar"></i> <span>Event</span></a></li>
     <li><a href="<?= site_url('mynote'); ?>"><i class="fa  fa-edit"></i> <span>My Note</span></a></li>
    
    
    <li class="treeview">
        <a href="#"><i class="fa fa-user"></i> <span>Member</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a> 
        <ul class="treeview-menu">
            <li><a href="<?= site_url('user/user_type'); ?>"><i class="fa fa-user"></i> <span>Member Type</span></a></li>
            <li><a href="<?= site_url('user'); ?>"><i class="fa fa-group"></i> <span>Member</span></a></li>
<!--            <li><a href="http://lms.xeroneit.net/admin/generate_id"><i class="fa fa-credit-card"></i> <span>Generate member ID</span></a></li>-->
        </ul>
    </li> 
	<li><a href="<?= site_url('Admin_report'); ?>"><i class="fa fa-money"></i> <span>Fine Report</span></a></li>

    <li><a href="<?= site_url('Admin_report/notification'); ?>"><i class="fa fa-envelope-o"></i> <span>Notification Report</span></a></li>
    <?php } ?>
    <li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
</ul>
<!-- /.sidebar-menu -->