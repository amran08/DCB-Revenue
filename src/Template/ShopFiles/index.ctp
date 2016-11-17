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
        <li><?= $this->Html->link(__('Shop Files'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Shop File List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Shop File'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                                                                                            <th><?= __('Sl. No.') ?></th>
                                                                                                                    <th><?= __('market_id') ?></th>
                                                                                                                                                <th><?= __('shop_id') ?></th>
                                                                                                                                                <th><?= __('allotment_type') ?></th>
                                                                                                                                                <th><?= __('owner_id') ?></th>
                                                                                                                                                <th><?= __('application_form_file') ?></th>
                                                                                                                                                <th><?= __('allotment_issue_date') ?></th>
                                                                                                    <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($shopFiles as $key => $shopFile) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($key+1) ?></td>
                                                                                                <td><?= $shopFile->has('market') ?
                                                    $this->Html->link($shopFile->market
                                                    ->title_bn, ['controller' => 'Markets',
                                                    'action' => 'view', $shopFile->market
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $shopFile->has('shop') ?
                                                    $this->Html->link($shopFile->shop
                                                    ->id, ['controller' => 'Shops',
                                                    'action' => 'view', $shopFile->shop
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= h($shopFile->allotment_type) ?></td>
                                                                                                <td><?= $shopFile->has('owner') ?
                                                    $this->Html->link($shopFile->owner
                                                    ->id, ['controller' => 'Owners',
                                                    'action' => 'view', $shopFile->owner
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= h($shopFile->application_form_file) ?></td>
                                                                                            <td><?= $this->System->display_date($shopFile->allotment_issue_date) ?></td>
                                                                                <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $shopFile->id],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $shopFile->id],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $shopFile->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $shopFile->id)]);
                                            
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

