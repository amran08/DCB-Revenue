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
            <?= $this->Html->link(__('Holding Numbers'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Holding Number') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Holding Number Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Plot') ?></th>
                                    <td><?= $holdingNumber->has('plot') ? $this->Html->link($holdingNumber->plot->id, ['controller' => 'Plots', 'action' => 'view', $holdingNumber->plot->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Building') ?></th>
                                    <td><?= $holdingNumber->has('building') ? $this->Html->link($holdingNumber->building->title_en, ['controller' => 'Buildings', 'action' => 'view', $holdingNumber->building->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Holding Number') ?></th>
                                    <td><?= h($holdingNumber->holding_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Applicant Name') ?></th>
                                    <td><?= h($holdingNumber->applicant_name) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Applicant Mobile Number') ?></th>
                                    <td><?= h($holdingNumber->applicant_mobile_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Applicant Present Address') ?></th>
                                    <td><?= h($holdingNumber->applicant_present_address) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Applicant Permanent Address') ?></th>
                                    <td><?= h($holdingNumber->applicant_permanent_address) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Starting Tax Amount') ?></th>
                                    <td><?= $this->Number->format($holdingNumber->starting_tax_amount) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$holdingNumber->status]) ?></td>
                                </tr>
                                                                                                                                        <tr>
                                    <th><?= __('Application Date') ?></th>
                                    <td><?= h($holdingNumber->application_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Issue Date') ?></th>
                                    <td><?= h($holdingNumber->issue_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($holdingNumber->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($holdingNumber->update_time) ?></tr>
                                </tr>
                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

