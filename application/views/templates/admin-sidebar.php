<?php 
 $lang = $this->session->userdata('lang');
 if($lang=="persion"){
	 $side_dashboard = 'داشبرد';
	 $side_note = 'نوت ها';
	 $side_note_archive = 'آرشیف نوت ها';
	 $side_add_note = 'اضافه کردن نوت';
	 $side_profile = 'پروفایل';
	 $side_note_category = 'کتگوری نوت ها';
	 $side_note_category_add = 'اضافه کردن کتگوری';
	 $side_note_category_list = 'لیست کتگوری ها';
	 $side_user_activity = 'فعالیت های کاربران';
	 $side_setting = 'تنظیمات';
	 
 }else{
	$side_dashboard = 'Dashboard';
	$side_note = 'Notes';
	$side_note_archive = 'Note Archive';
	$side_add_note = 'Add note';
	$side_profile = 'Profile';
	$side_note_category = 'Note Category';
	$side_note_category_add = 'Add Category';
	$side_note_category_list = 'List Category';
	$side_user_activity = 'User Activity';
	$side_setting = 'Setting';

 }
?>

<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li class="sidebar-search">
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
			</li>
			<li>
				<a href="#"><i class="fa fa-dashboard fa-fw"></i> <?php echo $side_dashboard ?></a>
			</li>
			<li>
				<a href="#"><i class="fa fa-edit fa-fw"></i>  <?php echo $side_note ?><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?php echo base_url()?>Note"> <?php echo $side_note_archive ?></a>
					</li>
					<li>
						<a href="<?php echo base_url()?>Note/create"> <?php echo $side_add_note ?></a>
					</li>
				</ul>
			</li>
			<li>
				<a href="<?php echo base_url()?>users/profile"><i class="fa fa-user fa-fw"></i>  <?php echo $side_profile ?></a>
			</li>

			<li>
				<a href="#"><i class="fa fa-folder-open fa-fw"></i>  <?php echo $side_note_category ?><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?php echo base_url() ?>note/load_category"><?php echo $side_note_category_list ?></a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>note/create_category"><?php echo $side_note_category_add ?></a>
					</li>

				</ul>
			</li>
			<li>
				<a href="<?php echo base_url() ?>users/activity"><i class="fa fa-users fa-fw"></i> <?php echo $side_user_activity ?></a>
			</li>
			<li>
				<a href="<?php echo base_url() ?>users/setting"><i class="fa fa-gear fa-fw"></i> <?php echo $side_setting ?></a>
			</li>

		</ul>
	</div>
</div>
</nav>
