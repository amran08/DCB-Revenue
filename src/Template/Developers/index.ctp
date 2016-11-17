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
        <li><?= $this->Html->link(__('Developer'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Developer List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Developer'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= __('Sl. No.') ?></th>
                                <th><?= __('Name (Bangla)') ?></th>
                                <th><?= __('Name (English)') ?></th>
                                <th><?= __('Details') ?></th>
                                <th><?= __('Address') ?></th>
                                <th><?= __('Status') ?></th>
                                <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($developers as $key => $developer) { ?>
                                <tr>
                                    <td><?= $this->Number->format($key + 1) ?></td>
                                    <td><?= h($developer->name_bn) ?></td>
                                    <td><?= h($developer->name_en) ?></td>
                                    <td><?= h($developer->details) ?></td>
                                    <td><?= h($developer->address) ?></td>
                                    <td><?= __($status[$developer->status]) ?></td>
                                    <td class="actions">
                                        <?php
                                        echo $this->Html->link(__('View'), ['action' => 'view', $developer->id], ['class' => 'btn btn-sm btn-info']);

                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $developer->id], ['class' => 'btn btn-sm btn-warning']);

                                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $developer->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $developer->id)]);
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

