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
        <li><?= $this->Html->link(__('Tax Collection Histories'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Tax Collection History List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Tax Collection History'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('owner_id') ?></th>
                            <th><?= __('tax_assessment_id') ?></th>
                            <th><?= __('collection_date') ?></th>
                            <th><?= __('late_feee_amount') ?></th>
                            <th><?= __('fine_amount') ?></th>
                            <th><?= __('rebet_amount') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($taxCollectionHistories as $key => $taxCollectionHistory) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $taxCollectionHistory->has('owner') ?
                                        $this->Html->link($taxCollectionHistory->owner
                                            ->id, ['controller' => 'Owners',
                                            'action' => 'view', $taxCollectionHistory->owner
                                                ->id]) : '' ?></td>
                                <td><?= $taxCollectionHistory->has('tax_assessment') ?
                                        $this->Html->link($taxCollectionHistory->tax_assessment
                                            ->id, ['controller' => 'TaxAssessments',
                                            'action' => 'view', $taxCollectionHistory->tax_assessment
                                                ->id]) : '' ?></td>
                                <td><?= $this->System->display_date($taxCollectionHistory->collection_date) ?></td>
                                <td><?= $this->Number->format($taxCollectionHistory->late_feee_amount) ?></td>
                                <td><?= $this->Number->format($taxCollectionHistory->fine_amount) ?></td>
                                <td><?= $this->Number->format($taxCollectionHistory->rebet_amount) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $taxCollectionHistory->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $taxCollectionHistory->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $taxCollectionHistory->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $taxCollectionHistory->id)]);

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

