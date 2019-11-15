<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h3 class="page-header"><?php echo $lang['title']; ?></h3>
        </div>
        <div class="col-lg-2">
            <a href="<?php echo site_url('note/create'); ?>" class="page-header btn btn-success pull-right"> <?php echo $lang['add_note']; ?></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $lang['title']; ?>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> <?php echo $lang['tbl_col_num']; ?></th>
                                <th> <?php echo $lang['tbl_col_title']; ?></th>
                                <th> <?php echo $lang['tbl_col_content']; ?></th>
                                <th> <?php echo $lang['tbl_col_category']; ?></th>
                                <th> <?php echo $lang['tbl_col_action']; ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($results as $note_item): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $note_item->title; ?></td>
                                    <td><?php echo $note_item->text; ?></td>
                                    <td><?php echo $this->note_model->get_category($note_item->category_id)['name'];
                                    ?></td>
                                    <td>
                                      

                                        <?php if ($this->session->userdata('is_logged_in')) { ?>
                                           
                                            <a href="<?php echo site_url('note/edit/' . $note_item->id); ?>"><label
                                                        style="cursor: pointer;"><?php echo $lang['edit'] ?></label></a> |
                                            <a href="<?php echo site_url('note/delete/' . $note_item->id); ?>"
                                               onClick="return confirm('Are you sure you want to delete?')">
                                                <label style="cursor: pointer;"><?php echo $lang['delete'] ?></label></a>
                                        <?php } // end if ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <div class="box-tools">
                             
                                <p class="pagination"><?php echo $links; ?></p>
                            </div>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>