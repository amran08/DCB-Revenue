<?php
$status = \Cake\Core\Configure::read('status_options');
$house_type = \Cake\Core\Configure::read('house_type');
?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= $this->Html->link(__('Houses'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('House List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New House'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('House Title') ?></th>
                            <th><?= __('Dohs') ?></th>
                            <th><?= __('Building') ?></th>
                            <th><?= __('House Type') ?></th>
                            <th><?= __('House Number') ?></th>


                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($houses as $key => $house) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= h($house->house_title) ?></td>
                                <td><?=
                                    $house->has('dohs') ?
                                        $this->Html->link($house->dohs
                                            ->title_bn, ['controller' => 'Dohss',
                                            'action' => 'view', $house->dohs
                                                ->id]) : ''
                                    ?></td>

                                <td><?=
                                    $house->has('building') ?
                                        $this->Html->link($house->building
                                            ->title_bn, ['controller' => 'Buildings',
                                            'action' => 'view', $house->building
                                                ->id]) : ''
                                    ?></td>
                                <td><?= __($house_type[$house->house_type]) ?></td>
                                <td><?= h($this->System->en_to_bn($house->house_number)) ?></td>


                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $house->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $house->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $house->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $house->id)]);
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

