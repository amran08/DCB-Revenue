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
        <li>
            <?= $this->Html->link(__('Plots'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Plot') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Plot Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>

            <?php //debug($plot);?>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('District') ?></th>
                            <td><?= $plot->has('district') ? $this->Html->link($plot->district->name_en, ['controller' => 'Districts', 'action' => 'view', $plot->district->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Upazila') ?></th>
                            <td><?= $plot->has('upazila') ? $this->Html->link($plot->upazila->name_bd, ['controller' => 'Upazilas', 'action' => 'view', $plot->upazila->id]) : '' ?></td>
                        </tr>
<!--                        <tr>-->
<!--                            <th>--><?php //= __('Plot Type') ?><!--</th>-->
<!--                            <td>--><?php // h($plot->plot_type) ?><!--</td>-->
<!--                        </tr>-->
                        <tr>
                            <th><?= __('Plot Number') ?></th>
                            <td><?=($this->System->en_to_bn($plot->plot_number)) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Road Number') ?></th>
                            <td><?=($this->System->en_to_bn($plot->road_number)) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Road Name') ?></th>
                            <td><?= h($plot->road_name) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Mouja') ?></th>
                            <td><?=
                                $plot->has('rs_mouja') ?
                                    $plot->rs_mouja
                                        ->name_bd : ''
                                ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Dohs') ?></th>
                            <td><?=
                                $plot->has('dohs') ?
                                    $this->Html->link($plot->dohs
                                        ->title_en, ['controller' => 'Dohss',
                                        'action' => 'view', $plot->dohs
                                            ->id]) : ''
                                ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Land Type') ?></th>
                            <td><?=
                                $plot->has('land_type') ?
                                    $plot->land_type
                                        ->lt_name : ''
                                ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Total Area') ?></th>
                            <td><?=($this->System->en_to_bn($plot->total_area)) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Area North') ?></th>
                            <td><?= ($this->System->en_to_bn($plot->area_north)) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Area South') ?></th>
                            <td><?= ($this->System->en_to_bn($plot->area_south)) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Area East') ?></th>
                            <td><?= ($this->System->en_to_bn($plot->area_east)) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Area West') ?></th>
                            <td><?= ($this->System->en_to_bn($plot->area_west)) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Allotment Date') ?></th>
                            <td><?= h($plot->allotment_date) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Create Time') ?></th>
                            <td><?= h($plot->create_time) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Update Time') ?></th>
                            <td><?= h($plot->update_time) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Is Lease') ?></th>
                            <td><?= $plot->is_lease ? __('Yes') : __('No'); ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Is Blank') ?></th>
                            <td><?= $plot->is_blank ? __('Yes') : __('No'); ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Is Residential') ?></th>
                            <td><?= $plot->is_residential ? __('Yes') : __('No'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

