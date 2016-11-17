<?php
$status = \Cake\Core\Configure::read('status_options');
$shop_type = \Cake\Core\Configure::read('shop_type');
?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= $this->Html->link(__('Shops'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Shop List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Shop'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Market') ?></th>
                            <th><?= __('Shop Type') ?></th>
                            <th><?= __('Shop Number') ?></th>
                            <th><?= __('Shop Title (English)') ?></th>
                            <th><?= __('Shop Title (Bangla)') ?></th>
                            <th><?= __('Total Area') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($shops as $key => $shop) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $shop->has('market') ?
                                        $this->Html->link($shop->market
                                            ->title_bn, ['controller' => 'Markets',
                                            'action' => 'view', $shop->market
                                                ->id]) : '' ?></td>
                                <td><?= __($shop_type[$shop->shop_type]) ?></td>
                                <td><?= h( $this->System->en_to_bn($shop->shop_number))?></td>
                                <td><?= h($shop->title_en) ?></td>
                                <td><?= h($shop->title_bn) ?></td>
                                <td><?= $this->System->en_to_bn($shop->total_area) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $shop->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $shop->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $shop->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $shop->id)]);

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

