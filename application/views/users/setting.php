<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-10">
			<h3 class="page-header"><?php echo $lang['title']; ?></h3>
		</div>
		<div class="col-lg-2">
        </div>
        <?php if($this->session->flashdata('msg_success')) { ?>
        </div>
        <div class="row">
                    <div class="alert alert-success">
                            <?php echo $this->session->flashdata('msg_success'); ?>       
                    </div>
                    <?php } ?>
                    <?php if($this->session->flashdata('msg_error')) { ?>
                    <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('msg_error'); ?>       
                    </div>
                <?php } ?>
		<div class="col-lg-12">
			<?php echo validation_errors(); ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo $lang['title']; ?></div>
				<?php $attributes = array("name" => "newsform", "role" => "form"); ?>
				<?php echo form_open_multipart('users/setting/'.$user_id); ?>
				<div class="panel-body">
                <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
					<img style="width:150px;" class="" src="<?php echo base_url().$setting_info['logo'] ?>" alt="profile">
				</div>
                <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
					<label class="control-label"> <?php echo $lang['logo']; ?></label>
					<input type="file" name="logo" class="form-control">
				</div>
                <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
					<label class="control-label"> <?php echo $lang['name']; ?></label>
					<input name="name" value="<?php echo $setting_info['name'] ?>" placeholder="Eneter Title" class="form-control">
				</div>
               
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
				<button type="submit" name="submit" class="btn btn-success"><?php echo $lang['btn_submit']; ?></button>
				<button type="reset" class="btn btn-warning"><?php echo $lang['btn_reset']; ?></butoon>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
    
</div>



