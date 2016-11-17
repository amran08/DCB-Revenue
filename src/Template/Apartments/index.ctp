<?php
$status = \Cake\Core\Configure::read('status_options');
$apartment_type = \Cake\Core\Configure::read('apartment_type');
?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= $this->Html->link(__('Apartments'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">

            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Apartment List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Apartment'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body"><div class="col-md-12">
                    <div class="col-md-7">
                        <?php
                        echo $this->Form->create();
                        echo $this->Form->input('dohs_id', ['options' => $dohs,'class'=>'form-control select2me','empty'=>__('Select'),'label' => __('Dohs')]);
                        ?><br><br>
                        <?php
                        echo $this->Form->input('building_id', ['empty'=>__('Select'),'options'=>$buildings_list,'class'=>'form-control select2me','label' => __('Building Title (Bangla)')]);
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
                            <th><?= __('Dohs') ?></th>
                            <th><?= __('Building') ?></th>
                            <th><?= __('Apartment Number') ?></th>
                            <th><?= __('Monthly Rent') ?></th>
                            <th><?= __('Apartment Type') ?></th>
                            <th><?= __('Total Area') ?></th>
                            <th><?= __('Floor Number') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($apartments as $key => $apartment) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $apartment->has('dohs') ?
                                        $this->Html->link($apartment->dohs
                                            ->title_bn, ['controller' => 'Dohss',
                                            'action' => 'view', $apartment->dohs
                                                ->id]) : '' ?></td>
                                <td><?= $apartment->has('building') ?
                                        $this->Html->link($apartment->building
                                            ->title_bn, ['controller' => 'Buildings',
                                            'action' => 'view', $apartment->building
                                                ->id]) : '' ?></td>
                                <td><?= h($this->System->en_to_bn($apartment->apartment_number)) ?></td>
                                <td><?= h($this->System->en_to_bn($apartment->monthly_rent)) ?></td>

                                <td><?= __($apartment_type[$apartment->apartment_type]) ?></td>
                                <td><?= h($this->System->en_to_bn($apartment->total_area)) ?></td>
                                <td><?= h($this->System->en_to_bn($apartment->floor_number)) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $apartment->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $apartment->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $apartment->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $apartment->id)]);

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

