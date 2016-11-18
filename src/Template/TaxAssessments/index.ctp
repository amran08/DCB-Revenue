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
        <li><?= $this->Html->link(__('Tax Assessments'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Tax Assessment List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Tax Assessment'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                    <?= $this->Form->postLink(__('Reset Assessments'), ['action' => 'resetAssessments'], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to Reset Assessed Tax?')]);
                    ?>
                </div>
            </div>

            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>

                            <th><?= __('Owners') ?></th>

                            <th><?= __('Property Type Table Name') ?></th>
                            <th><?= __('Assessed Amount') ?></th>
                            <th><?= __('Total Amount') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($taxAssessments as $key => $taxAssessment) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>

                                <td><?= $taxAssessment->has('owner') ?
                                        $this->Html->link($taxAssessment->owner
                                            ->name_bn, ['controller' => 'Owners',
                                            'action' => 'view', $taxAssessment->owner
                                                ->id]) : '' ?></td>

                                <td><?= h(__($taxAssessment->property_type_table_name))?></td>
                                <td><?= $this->Number->format($taxAssessment->assessed_amount) ?></td>
                                <td><?= $this->Number->format($taxAssessment->total_amount) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $taxAssessment->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $taxAssessment->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $taxAssessment->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $taxAssessment->id)]);

                                    ?>

                                </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev('<<');
                    echo $this->Paginator->numbers();
                    echo $this->Paginator->next('>>');
                    ?>
                </ul>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

