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
            <?= $this->Html->link(__('Shop Files'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Shop File') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Shop File Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Market') ?></th>
                                    <td><?= $shopFile->has('market') ? $this->Html->link($shopFile->market->title_bn, ['controller' => 'Markets', 'action' => 'view', $shopFile->market->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Shop') ?></th>
                                    <td><?= $shopFile->has('shop') ? $this->Html->link($shopFile->shop->id, ['controller' => 'Shops', 'action' => 'view', $shopFile->shop->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Allotment Type') ?></th>
                                    <td><?= h($shopFile->allotment_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Owner') ?></th>
                                    <td><?= $shopFile->has('owner') ? $this->Html->link($shopFile->owner->id, ['controller' => 'Owners', 'action' => 'view', $shopFile->owner->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Application Form File') ?></th>
                                    <td><?= h($shopFile->application_form_file) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Contract File') ?></th>
                                    <td><?= h($shopFile->contract_file) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Floor Map') ?></th>
                                    <td><?= h($shopFile->floor_map) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Contract Value') ?></th>
                                    <td><?= $this->Number->format($shopFile->contract_value) ?></td>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Allotment Issue Date') ?></th>
                                    <td><?= h($shopFile->allotment_issue_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Allotment Expire Date') ?></th>
                                    <td><?= h($shopFile->allotment_expire_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($shopFile->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($shopFile->update_time) ?></tr>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $shopFile->status ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

