<?php
$status = \Cake\Core\Configure::read('status_options');

$building_type = \Cake\Core\Configure::read('building_type');
?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= $this->Html->link(__('Buildings'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->

        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Building List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Building'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="col-md-12">
                    <div class="col-md-7">
                        <?php
                        echo $this->Form->create();
                        echo $this->Form->input('dohs_id', ['options' => $dohs, 'empty'=>__('Select'),'label' => __('Dohs')]);
                        ?><br><br>
                        <?php
                        echo $this->Form->input('title_bn', ['label' => __('Building Title (Bangla)')]);
                        ?><br><br>
                    </div><br><br>
                    <div class="col-md-5">
                        <?php
                        echo $this->Form->button(__('Filter'), ['type' => 'submit', 'class' => 'btn btn-sm btn-primary']);
                        echo "&nbsp;&nbsp";
                        echo $this->Html->link(__('Reset'), ['action' => 'index'], ['class' => 'btn btn-sm btn-primary']);
                        echo $this->Form->end();
                        ?>
                    </div>

                </div>
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Building Title (English)') ?></th>
                            <th><?= __('Building Title (Bangla)') ?></th>
                            <th><?= __("Plot Number") ?></th>

                            <th><?= __('Dohs') ?></th>
                            <th><?= __('Road Number') ?></th>
                            <th><?= __('Build Type') ?></th>


                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($buildings as $key => $building) { ?>


                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= h($building->title_en) ?></td>
                                <td><?= h($building->title_bn) ?></td>
                                <td>
                                    <?php
                                    foreach ($building['building_plot_info'] as $b_plots) {

                                     //  echo $b_plots['plot']['plot_number'] . ',  ';

//                                        $building->has('building_plot_info') ?
                                           echo  $this->Html->link($this->System->en_to_bn($b_plots['plot']['plot_number']), ['controller' => 'Plots',
                                            'action' => 'view',$b_plots['plot']['id']]).', ';
                                    }
                                    ?>
                                </td>

                                <td><?=
                                    $building->has('dohs') ?
                                        $this->Html->link($building->dohs
                                            ->title_bn, ['controller' => 'Dohss',
                                            'action' => 'view', $building->dohs
                                                ->id]) : ''
                                    ?></td>
                                <td><?= h($this->System->en_to_bn($building->road_number)) ?></td>

                                <td><?= __($building_type[$building->build_type])?></td>


                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $building->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $building->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $building->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $building->id)]);
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

