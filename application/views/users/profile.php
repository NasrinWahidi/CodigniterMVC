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
				<?php echo form_open_multipart('users/profile/'.$user_id); ?>
				<div class="panel-body">
                <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
					<img style="width:150px;" class="img-circle" src="<?php echo base_url().$prof_info['image'] ?>" alt="profile">
				</div>
                <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
					<label class="control-label"> <?php echo $lang['image']; ?></label>
					<input type="file" name="profile_img" class="form-control">
				</div>
                <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
					<label class="control-label"> <?php echo $lang['name']; ?></label>
					<input name="firstname" value="<?= $prof_info['firstname'] ?>" placeholder="Eneter Title" class="form-control">
				</div>
                <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
					<label class="control-label"> <?php echo $lang['lastname']; ?></label>
					<input name="lastname" value="<?= $prof_info['lastname'] ?>" placeholder="Eneter Title" class="form-control">
				</div>
                <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
					<label class="control-label"> <?php echo $lang['email']; ?></label>
					<input name="email" value="<?= $prof_info['email'] ?>" placeholder="Eneter Title" class="form-control">
                </div>
                
                <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
                    <label class="control-label" for="inputError"><?php echo form_error('password'); ?></label>
                    <input class="form-control" placeholder="<?php echo $lang['password']; ?>" name="password" type="password" value="">
                </div>

                <div class="form-group <?php echo form_error('cpassword') ? 'has-error' : '' ?>">
                    <label class="control-label" for="inputError"><?php echo form_error('cpassword'); ?></label>
                    <input class="form-control" placeholder="<?php echo $lang['cpassword']; ?>" name="cpassword" type="password" value="">
                </div>
				
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
				<button type="submit" name="submit" class="btn btn-success"><?php echo $lang['btn_submit']; ?></button>
				<a href="<?php echo site_url('news'); ?>" class="btn btn-warning"><?php echo $lang['btn_reset']; ?></a>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
    
</div>



