<?php
$status = \Cake\Core\Configure::read('status_options');
$usage_type = \Cake\Core\Configure::read('usage_type');

$owner_type = \Cake\Core\Configure::read('building_ownership_type');

$tax_collection_location = \Cake\Core\Configure::read('tax_collection_location');
$economic_year = \Cake\Core\Configure::read('economic_year');

?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= $this->Html->link(__('Tax Settings'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Tax Settings List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Tax Setting'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Owner Type') ?></th>
                            <th><?= __('Tax Rate') ?></th>
                            <th><?= __('Economic Year') ?></th>
                            <th><?= __('Usage Type') ?></th>
                            <th><?= __('Tax Collection Location') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($taxSettings as $key => $taxSetting) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= __($owner_type[$taxSetting->owner_type])?></td>
                                <td><?= $this->Number->format($taxSetting->tax_rate) ?></td>
                                <td><?=__($economic_year[$taxSetting->economic_year])?></td>
                                <td><?= __($usage_type[$taxSetting->usage_type])?></td>
                                <td><?=__($tax_collection_location[$taxSetting->location])?></td>
                                <td><?= __($status[$taxSetting->status]) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $taxSetting->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $taxSetting->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $taxSetting->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $taxSetting->id)]);

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

