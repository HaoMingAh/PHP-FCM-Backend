<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url();?>assets/img/logo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Enigma Messenger</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
		<li class="header">HEADER</li>
		<li id="dash"><a href="<?= site_url('Admin/index') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
		<li id="users"><a href="<?= site_url('Admin/users') ?>"><i class="fa fa-users"></i> <span>Manage Users</span></a></li>
		<li id="events"><a href="<?= site_url('Admin/events') ?>"><i class="fa fa-flag"></i> <span>Manage Events</span></a></li>
		<li id="bookings"><a href="<?= site_url('Admin/bookings') ?>"><i class="fa fa-book"></i> <span>Manage Bookings</span></a></li>
		<li id="tickets"><a href="<?= site_url('Admin/tickets') ?>"><i class="fa fa-ticket"></i> <span>Manage Tickets</span></a></li>
		<li id="purchases"><a href="<?= site_url('Admin/purchases') ?>"><i class="fa fa-shopping-cart"></i> <span>Purchase History</span></a></li>
      	
       
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
