<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h3 class="page-header"><?php echo $lang['title']; ?></h3>
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
                                <th>#</th>
                                <th> <?php echo $lang['user_name']; ?></th>
                                <th> <?php echo $lang['login_time']; ?></th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php 
                            foreach ($activity as $note_item): ?>
                                <tr>
                                   <td><?php echo $i++ ?></td>
                                   <td><?php echo $this->user_model->get_user($note_item['user_id'])['firstname'];  ?></td>
                                   <td><?php echo date('Y-m-d h:i:m a',$note_item['login_time']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                           
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>