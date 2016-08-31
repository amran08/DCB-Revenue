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
        <li><?= $this->Html->link(__('Plots'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Plot List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Plot'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= __('Sl. No.') ?></th>
                                <th><?= __('District') ?></th>
                                <th><?= __('Upazila') ?></th>
                                <th><?= __('Mouja') ?></th>
                                <th><?= __('Dohs') ?></th>
                                <th><?= __('Land Type') ?></th>
                                <th><?= __('Plot Type') ?></th>
                                <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($plots as $key => $plot) { ?>
                                <tr>
                                    <td><?= $this->Number->format($key + 1) ?></td>
                                    <td><?=
                                        $plot->has('district') ?
                                                $this->Html->link($plot->district
                                                        ->name_bn, ['controller' => 'Districts',
                                                    'action' => 'view', $plot->district
                                                    ->id]) : ''
                                        ?></td>
                                    <td><?=
                                        $plot->has('upazila') ?
                                                $this->Html->link($plot->upazila
                                                        ->name_bd, ['controller' => 'Upazilas',
                                                    'action' => 'view', $plot->upazila
                                                    ->id]) : ''
                                        ?></td>
                                    <td><?=
                                        $plot->has('rs_mouja') ?
                                                $this->Html->link($plot->rs_mouja
                                                        ->name_bd, ['controller' => 'RsMoujas',
                                                    'action' => 'view', $plot->rs_mouja
                                                    ->id]) : ''
                                        ?></td>
                                    <td><?=
                                        $plot->has('dohs') ?
                                                $this->Html->link($plot->dohs
                                                        ->title_en, ['controller' => 'Dohss',
                                                    'action' => 'view', $plot->dohs
                                                    ->id]) : ''
                                        ?></td>

                                    <td><?=
                                        $plot->has('land_type') ?
                                                $this->Html->link($plot->land_type
                                                        ->lt_name, ['controller' => 'LandTypes',
                                                    'action' => 'view', $plot->land_type
                                                    ->id]) : ''
                                        ?></td>
                                    <td><?= h($plot->plot_type) ?></td>
                                    <td class="actions">
                                        <?php
                                        echo $this->Html->link(__('View'), ['action' => 'view', $plot->id], ['class' => 'btn btn-sm btn-info']);

                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $plot->id], ['class' => 'btn btn-sm btn-warning']);

                                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $plot->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $plot->id)]);
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

