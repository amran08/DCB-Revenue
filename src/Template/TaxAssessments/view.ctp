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
            <?= $this->Html->link(__('Tax Assessments'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Tax Assessment') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Tax Assessment Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Economic Year') ?></th>
                                    <td><?= h($taxAssessment->economic_year) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Owner') ?></th>
                                    <td><?= $taxAssessment->has('owner') ? $this->Html->link($taxAssessment->owner->id, ['controller' => 'Owners', 'action' => 'view', $taxAssessment->owner->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Assess Type') ?></th>
                                    <td><?= h($taxAssessment->assess_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Property Type') ?></th>
                                    <td><?= h($taxAssessment->property_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Property Type Table Name') ?></th>
                                    <td><?= h($taxAssessment->property_type_table_name) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Property Title') ?></th>
                                    <td><?= h($taxAssessment->property_title) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Tax Setting') ?></th>
                                    <td><?= $taxAssessment->has('tax_setting') ? $this->Html->link($taxAssessment->tax_setting->id, ['controller' => 'TaxSettings', 'action' => 'view', $taxAssessment->tax_setting->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Remarks') ?></th>
                                    <td><?= h($taxAssessment->remarks) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Dohs Id') ?></th>
                                    <td><?= $this->Number->format($taxAssessment->dohs_id) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('If Revised Parent Assess Row Id') ?></th>
                                    <td><?= $this->Number->format($taxAssessment->if_revised_parent_assess_row_id) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Property Id') ?></th>
                                    <td><?= $this->Number->format($taxAssessment->property_id) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Area') ?></th>
                                    <td><?= $this->Number->format($taxAssessment->total_area) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Assessed Amount') ?></th>
                                    <td><?= $this->Number->format($taxAssessment->assessed_amount) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Amount') ?></th>
                                    <td><?= $this->Number->format($taxAssessment->total_amount) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Assess By') ?></th>
                                    <td><?= $this->Number->format($taxAssessment->assess_by) ?></td>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Assess Date') ?></th>
                                    <td><?= h($taxAssessment->assess_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($taxAssessment->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($taxAssessment->update_time) ?></tr>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $taxAssessment->status ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

