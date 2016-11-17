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
            <?= $this->Html->link(__('Tax Collections'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Tax Collection') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Tax Collection Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Owner') ?></th>
                                    <td><?= $taxCollection->has('owner') ? $this->Html->link($taxCollection->owner->id, ['controller' => 'Owners', 'action' => 'view', $taxCollection->owner->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Tax Assessment') ?></th>
                                    <td><?= $taxCollection->has('tax_assessment') ? $this->Html->link($taxCollection->tax_assessment->id, ['controller' => 'TaxAssessments', 'action' => 'view', $taxCollection->tax_assessment->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Economic Year') ?></th>
                                    <td><?= h($taxCollection->economic_year) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Base Amount') ?></th>
                                    <td><?= $this->Number->format($taxCollection->base_amount) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Rebet Amount') ?></th>
                                    <td><?= $this->Number->format($taxCollection->rebet_amount) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Late Fee Amount') ?></th>
                                    <td><?= $this->Number->format($taxCollection->late_fee_amount) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Fine Amount') ?></th>
                                    <td><?= $this->Number->format($taxCollection->fine_amount) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Amount') ?></th>
                                    <td><?= $this->Number->format($taxCollection->total_amount) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Tax Assessment Id') ?></th>
                                    <td><?= $this->Number->format($taxCollection->tax_assessment_id) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$taxCollection->status]) ?></td>
                                </tr>
                                                            
                                                            <tr>
                                    <th><?= __('Collected By') ?></th>
                                    <td><?= $this->Number->format($taxCollection->collected_by) ?></td>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Collection Date') ?></th>
                                    <td><?= h($taxCollection->collection_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($taxCollection->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($taxCollection->update_time) ?></tr>
                                </tr>
                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

