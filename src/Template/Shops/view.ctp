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
            <?= $this->Html->link(__('Shops'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Shop') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Shop Details') ?>
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
                                    <td><?= $shop->has('market') ? $this->Html->link($shop->market->id, ['controller' => 'Markets', 'action' => 'view', $shop->market->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Shop Type') ?></th>
                                    <td><?= h($shop->shop_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Shop Number') ?></th>
                                    <td><?= h($shop->shop_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Shop Title (English)') ?></th>
                                    <td><?= h($shop->title_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Shop Title (Bangla)') ?></th>
                                    <td><?= h($shop->title_bn) ?></td>
                                </tr>

                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Total Area') ?></th>
                                    <td><?= $this->Number->format($shop->total_area) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Floor Number') ?></th>
                                    <td><?= $this->Number->format($shop->floor_number) ?></td>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($shop->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($shop->update_time) ?></tr>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $shop->status ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

