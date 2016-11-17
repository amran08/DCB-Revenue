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
                <div class="col-md-12">
                    <div class="col-md-7">
                        <?php
                        echo $this->Form->create();
                        echo $this->Form->input('dohs_id', ['options' => $dohs, 'empty'=>__('Select'),'label' => __('Dohs')]);
                        ?><br><br>
                        <?php
                        echo $this->Form->input('plot_number', ['label' => __('Plot Number')]);
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
                            <th><?= __('Plot Number') ?></th>
                            <th><?= __('Total Area') ?></th>
                            <th><?= __('Road Number') ?></th>
                            <th><?= __('Dohs') ?></th>
                            <th><?= __('Land Type') ?></th>
                            <th><?= __('Lease/Blank/Residential') ?></th>
                            <th><?= __('Actions') ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($plots as $key => $plot) {

                            // debug($plot);
                            ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= h($this->System->en_to_bn($plot->plot_number)) ?></td>

                                <td><?= h($this->System->en_to_bn($plot->total_area)) ?></td>
                                <td><?= h($this->System->en_to_bn($plot->road_number)) ?></td>
                                <td><?=
                                    $plot->has('dohs') ?
                                        $this->Html->link($plot->dohs
                                            ->title_bn, ['controller' => 'Dohss',
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
                                <td><?php
                                    if (isset($plot['is_lease']) && $plot['is_lease'] == 1) {
                                        echo __('Lease');
                                    }
                                    if (isset($plot['is_blank']) && $plot['is_blank'] == 1) {
                                        echo __('Blank');
                                    }
                                    if (isset($plot['is_residential']) && $plot['is_residential'] == 1) {

                                        echo __('Residential');

                                    }
                                    ?></td>
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

<script>
    $(document).ready(function () {
        var url = "<?php echo $this->request->webroot; ?>Plots/plotGridData";

// prepare the data
        var source =
        {
            dataType: "json",
            dataFields: [
                {name: 'id', type: 'int'},
                {name: 'plot_number', type: 'int'},
                {name: 'toal_area', type: 'string'},
                {name: 'road_number', type: 'string'},
                {name: 'dohs', type: 'int'},
                {name: 'land_type', type: 'string'},
                {name: 'is_lease', type: 'int'},

            ],
            id: 'id',
            url: url
        };

        var dataAdapter = new $.jqx.dataAdapter(source);

        $("#dataTable").jqxGrid(
            {
                width: '100%',
                source: dataAdapter,
                pageable: true,
                filterable: true,
                sortable: true,
                showfilterrow: true,
                columnsresize: true,
                pagesize: 15,
                pagesizeoptions: ['100', '200', '300', '500', '1000', '1500'],
//                selectionmode: 'checkbox',
                altrows: true,
                autoheight: true,


                columns: [
                    {text: '<?= __('Sl. No.') ?>', cellsalign: 'center', dataField: 'id', width: '14%'},
                    {text: '<?= __('Plot Number') ?>', dataField: 'plot_number', width: '14%'},
                    {text: '<?= __('Total Area') ?>', dataField: 'total_area', width: '13%'},
                    {text: '<?= __('Road Number') ?>', dataField: 'road_number', width: '13%'},
                    {text: '<?= __('Dohs') ?>', dataField: 'dohs', width: '13%'},
                    {text: '<?= __('Land Type')?>', dataField: 'land_type', width: '13%'},

                    {text: '<?= __('Actions') ?>', cellsalign: 'center', dataField: 'actions', width: '30%'}
                ]
            });


    });
</script>



