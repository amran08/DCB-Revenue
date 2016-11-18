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
            <?= $this->Html->link(__('Tax Collection Histories'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Tax Collection History') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Tax Collection History Details') ?>
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
                                    <td><?= $taxCollectionHistory->has('owner') ? $this->Html->link($taxCollectionHistory->owner->id, ['controller' => 'Owners', 'action' => 'view', $taxCollectionHistory->owner->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Tax Assessment') ?></th>
                                    <td><?= $taxCollectionHistory->has('tax_assessment') ? $this->Html->link($taxCollectionHistory->tax_assessment->id, ['controller' => 'TaxAssessments', 'action' => 'view', $taxCollectionHistory->tax_assessment->id]) : '' ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Late Feee Amount') ?></th>
                                    <td><?= $this->Number->format($taxCollectionHistory->late_feee_amount) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Fine Amount') ?></th>
                                    <td><?= $this->Number->format($taxCollectionHistory->fine_amount) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Rebet Amount') ?></th>
                                    <td><?= $this->Number->format($taxCollectionHistory->rebet_amount) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Collected Amount') ?></th>
                                    <td><?= $this->Number->format($taxCollectionHistory->collected_amount) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$taxCollectionHistory->status]) ?></td>
                                </tr>
                                                            
                                                            <tr>
                                    <th><?= __('Collected By') ?></th>
                                    <td><?= $this->Number->format($taxCollectionHistory->collected_by) ?></td>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Collection Date') ?></th>
                                    <td><?= h($taxCollectionHistory->collection_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($taxCollectionHistory->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($taxCollectionHistory->update_time) ?></tr>
                                </tr>
                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

