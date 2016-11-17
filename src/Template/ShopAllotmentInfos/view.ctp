<?php
$status = \Cake\Core\Configure::read('status_options');
?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Shop Allotment Infos'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Shop Allotment Info') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Shop Allotment Info Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Name En') ?></th>
                            <td><?= h($shopAllotmentInfo->name_en) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Name Bn') ?></th>
                            <td><?= h($shopAllotmentInfo->name_bn) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Mobile Number') ?></th>
                            <td><?= h($shopAllotmentInfo->mobile_number) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Shop Id') ?></th>
                            <td><?= $this->Number->format($shopAllotmentInfo->shop_id) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Market Id') ?></th>
                            <td><?= $this->Number->format($shopAllotmentInfo->market_id) ?></td>
                        </tr>


                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= __($status[$shopAllotmentInfo->status]) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Create Time') ?></th>
                            <td><?= h($shopAllotmentInfo->create_time) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Update Time') ?></th>
                            <td><?= h($shopAllotmentInfo->update_time) ?></tr>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

