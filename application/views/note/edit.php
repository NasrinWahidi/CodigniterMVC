<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-10">
			<h3 class="page-header"><?php echo $lang['title']; ?></h3>
		</div>
		<div class="col-lg-2">
			<a href="<?= site_url('note'); ?>" class="page-header btn btn-success pull-right"><?php echo $lang['note_list']; ?></a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<?php echo validation_errors(); ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo $lang['title']; ?></div>
				<?php $attributes = array("name" => "noteform", "role" => "form"); ?>
				<?php echo form_open_multipart('note/edit/'.$note_item['id']); ?>
				<div class="panel-body">
					<div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
					<label class="control-label"><?php echo $lang['enter_title']; ?></label>
					<input name="title" value="<?= $note_item['title'] ?>" placeholder="<?php echo $lang['enter_title']; ?>" class="form-control">
				</div>
				<div class="form-group <?php echo form_error('text') ? 'has-error' : '' ?>">
					<label class="control-label"><?php echo $lang['enter_text']; ?></label>
					<textarea name="text" class="form-control" rows="10" cols="40"><?= $note_item['text'] ?></textarea>
				</div>
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
				<button type="submit" name="submit" class="btn btn-success"><?php echo $lang['btn_submit']; ?></button>
				<a href="<?php echo site_url('note'); ?>" class="btn btn-warning"><?php echo $lang['btn_reset']; ?></a>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>



