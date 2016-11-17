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
        <li><?= $this->Html->link(__('Holding Numbers'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Holding Number List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Holding Number'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= __('Sl. No.') ?></th>

                                <th><?= __('Building') ?></th>
                                <th><?= __('Holding Number') ?></th>
                                <th><?= __('Applicant Name') ?></th>
                                <th><?= __('Mobile Number') ?></th>
                                <th><?= __('Application date') ?></th>
                                <th><?= __('Status') ?></th>
                                <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($holdingNumbers as $key => $holdingNumber) { ?>
                                <tr>
                                    <td><?= $this->Number->format($key + 1) ?></td>

                                    <td><?=
                                        $holdingNumber->has('building') ?
                                                $this->Html->link($holdingNumber->building
                                                        ->title_en, ['controller' => 'Buildings',
                                                    'action' => 'view', $holdingNumber->building
                                                    ->id]) : ''
                                        ?></td>
                                    <td><?= h($holdingNumber->holding_number) ?></td>
                                    <td><?= h($holdingNumber->applicant_name) ?></td>
                                    <td><?= h($holdingNumber->applicant_mobile_number) ?></td>
                                    <td><?= h($holdingNumber->application_date) ?></td>
                                    <td><?= __($status[$holdingNumber->status]) ?></td>
                                    <td class="actions">
                                        <?php
                                        echo $this->Html->link(__('View'), ['action' => 'view', $holdingNumber->id], ['class' => 'btn btn-sm btn-info']);

                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $holdingNumber->id], ['class' => 'btn btn-sm btn-warning']);

                                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $holdingNumber->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $holdingNumber->id)]);
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

