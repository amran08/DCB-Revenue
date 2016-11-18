<?php
use Cake\Core\Configure;

$status = Configure::read('status')
?>
<style>
    .modal .modal-dialog {
        width: 1100px;
    }
</style>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Tax Collection Histories'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Tax Collection History') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Tax Collection History') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['controller' => 'TaxCollections', 'action' => 'add'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($taxCollectionHistory, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div><h1><?php echo $owner_name_property['owner']['name_bn']; ?></h1><br>


                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th><?= __('Sl. No.') ?></th>
                                <th><?= __('Collected Amount') ?></th>
                                <th><?= __('Collection Date') ?></th>
                                <th><?= __('Late Fee') ?></th>
                                <th><?= __('Fine') ?></th>
                                <th><?= __('Rebet') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($taxCollectionHistory as $key => $history) {
                                ?>
                                <tr>

                                    <td><?php echo $this->Number->format($key + 1); ?></td>
                                    <td><?php echo $this->Number->format($history['collected_amount']); ?></td>
                                    <td><?php echo $history['collection_date']; ?></td>
                                    <td><?php echo $this->Number->format($history['late_fee_amount']); ?></td>
                                    <td><?php echo $this->Number->format($history['fine_amount']); ?></td>
                                    <td><?php echo $this->Number->format($history['rebet_amount']); ?></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>


        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

<div id="history_prev_collections" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="history_data">
                        <div class="portlet-body">
                            <?= $this->Form->create($taxCollectionHistory, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                            <div class="row">

                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                        <button type="button" data-dismiss="modal" class="btn btn-primary update-history">Save
                            changes
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        $('.show-history').on('click', function () {
            $("#history_data").load("<?php echo $this->request->webroot;?>/tax-collection-histories/collection_histories_single_assessment/1", function (data) {

                //$("#history_data").html(data);
            });
        });
        //        $(document).on('click', '.update', function () {
        //            setTimeout(function () {
        //                $modal
        //                    //.modal('loading')
        //                    .find('.modal-body')
        //                    .prepend('<div class="alert alert-info fade in">' +
        //                        'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
        //                        '</div>');
        //            }, 1000);
        //        });


    </script>