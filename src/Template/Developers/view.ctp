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
            <?= $this->Html->link(__('Developer'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Developer') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Developer Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Name (English)') ?></th>
                                    <td><?= h($developer->name_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Name (Bangla)') ?></th>
                                    <td><?= h($developer->name_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Details') ?></th>
                                    <td><?= h($developer->details) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Address') ?></th>
                                    <td><?= h($developer->address) ?></td>
                                </tr>
                                                                                                                                                                                                                
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$developer->status]) ?></td>
                                </tr>
                                                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

