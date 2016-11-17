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
            <?= $this->Html->link(__('Building Files'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Building File') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Building File Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('File Type') ?></th>
                                    <td><?= h($buildingFile->file_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Submission Type') ?></th>
                                    <td><?= h($buildingFile->submission_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Building') ?></th>
                                    <td><?= $buildingFile->has('building') ? $this->Html->link($buildingFile->building->title_en, ['controller' => 'Buildings', 'action' => 'view', $buildingFile->building->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('File Url') ?></th>
                                    <td><?= h($buildingFile->file_url) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Applicant Name En') ?></th>
                                    <td><?= h($buildingFile->applicant_name_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Applicant Address') ?></th>
                                    <td><?= h($buildingFile->applicant_address) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Applicant Contact Number') ?></th>
                                    <td><?= h($buildingFile->applicant_contact_number) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Decision By') ?></th>
                                    <td><?= $this->Number->format($buildingFile->decision_by) ?></td>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Submit Date') ?></th>
                                    <td><?= h($buildingFile->submit_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Decision Date') ?></th>
                                    <td><?= h($buildingFile->decision_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($buildingFile->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($buildingFile->update_time) ?></tr>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $buildingFile->status ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

