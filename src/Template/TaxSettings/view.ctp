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
            <?= $this->Html->link(__('Tax Settings'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Tax Setting') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Tax Setting Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Owner Type') ?></th>
                                    <td><?= h($taxSetting->owner_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Economic Year') ?></th>
                                    <td><?= h($taxSetting->economic_year) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Usage Type') ?></th>
                                    <td><?= h($taxSetting->usage_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Location') ?></th>
                                    <td><?= h($taxSetting->location) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Tax Rate') ?></th>
                                    <td><?= $this->Number->format($taxSetting->tax_rate) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$taxSetting->status]) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($taxSetting->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($taxSetting->update_time) ?></tr>
                                </tr>
                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

