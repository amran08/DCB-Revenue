<?php
$status = \Cake\Core\Configure::read('status_options');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript"
        src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>


<script type="text/javascript"
        src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>


<script type="text/javascript"
        src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>


<script type="text/javascript"
        src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>

<script type="text/javascript"
        src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<script type="text/javascript"
        src="https://cdn.datatables.net/plug-ins/1.10.12/i18n/Bangla.json"></script>

<link rel="stylesheet" type="text/css"
      href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>

<link rel="stylesheet" type="text/css"
      href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"/>


<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= $this->Html->link(__('Reports'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Report Dohs') ?>
                </div>
            </div>
            <div class="portlet-body">

                <?php $options = ['apartment' => __('Apartment'), 'house' => __('House')]; ?>
                <?= $this->Form->create($reports, ['class' => 'form-horizontal', 'role' => 'form', 'id' => 'reports-add-form']) ?>
                <div class="col-md-7">
                    <?php
                    echo $this->Form->input('dohs_id');
                    echo $this->Form->input('property_type', ['options' => $options]);
                    ?>
                    <br>
                </div>
                <br><br>
                <?= $this->Form->button(__('ShowReport'), ['class' => 'btn blue pull-right', 'style' => 'margin-top:40px']) ?>
                <?= $this->Form->end(); ?>
                <br>
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover" id="report_table">
                      <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Building Title (English)') ?></th>
                            <th><?= __('Building Title (Bangla)') ?></th>
                            <th><?= __('Plot Number') ?></th>


                            <!--                            <th>--><? //= __('Dohs') ?><!--</th>-->
                            <?php if (isset($data_ap) && $data_ap == 1) { ?>


                                <th><?php echo __('Apartment') ?> :: <?php echo __('Owner'); ?></th>

                            <?php } else { ?>

                                <th><?php echo __('House') ?></th>
                                <th><?php echo __('House Owner') ?></th>
                            <?php } ?>

                            <th><?php echo __('Building Owner') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($result) && $result != "") {
                            foreach ($result as $key => $result) { ?>

                                <tr>
                                    <td><?= $this->Number->format($key + 1) ?></td>
                                    <td><?= $result['title_en'] ?></td>

                                    <td><?= $result['title_bn'] ?></td>

                                    <td>
                                        <?php
                                        foreach ($result['building_plot_info'] as $b_plots) {

                                            echo "<a href=\"#plot-info-modal\" data-plot-number-bn ='" . $this->System->en_to_bn($b_plots['plot']['plot_number']) . "'  plot-id='" . $b_plots['plot']['id'] . "' class =\"plot-info-modal\"  data-toggle=\"modal\">" . $this->System->en_to_bn($b_plots['plot']['plot_number']) . ",</a>";

                                        }
                                        ?>
                                    </td>
                                    <!--                                    <td>-->
                                    <?//= $result['dohs']['title_en'] ?><!--</td>-->

                                    <?php
                                    if (isset($data_ap) && $data_ap == 1) {
                                        $apartment_index = 1;
                                        $owner_index = 1;
                                        // echo '<td>';
                                        // foreach ($result['apartments'] as $key => $apartments) {

                                        //     echo "<a href=\"#basicmodal\"   data-type =\"apartment\" data-property-name ='" . $apartments['apartment_number'] . "' data-property-id='" . $apartments['id'] . "' class =\"ajax-basic-modal\"  data-toggle=\"modal\">" . $apartments['apartment_number'] . "</a><br>";
                                        // }
                                        // echo '</td>';

                                        echo '<td>';
                                        foreach ($result['apartments'] as $key => $apartments) {
                                            //echo $key;
                                            foreach ($apartments['owners'] as $owners) {
                                                // $link = $this->url->build('/Owners/view/') . $owners['id'];

                                                //echo $apartments['apartment_number'] . " : ";
                                                echo "<a href=\"#basicmodal\"   data-type =\"apartment\" data-property-name ='" . $apartments['apartment_number'] . "' data-property-id='" . $apartments['id'] . "' class =\"ajax-basic-modal\"  data-toggle=\"modal\">" . $apartments['apartment_number'] . "</a> :: ";
                                                echo "<a href=\"#ownermodal\"  data-owner-name-bn ='" . $owners['name_bn'] . "' data-owner-id='" . $owners['id'] . "' class =\"ajax-owner-modal\"  data-toggle=\"modal\">" . $owners['name_bn'] . "</a><br>";

                                            }
                                        }
                                        echo '</td>';

                                    }
                                    if (isset($data_house) && $data_house == 1) {
                                        foreach ($result['houses'] as $house) {

                                            //echo '<td>' . $house['house_title'] . '</td>';
                                            echo "<td><a href=\"#basicmodal\"  data-type =\"house\" data-property-name ='" . $house['house_title'] . "' data-property-id='" . $house['id'] . "' class =\"ajax-basic-modal\"  data-toggle=\"modal\">" . $house['house_title'] . "</a></td><br>";

                                        }
                                        foreach ($result['houses'][0]['owners'] as $house_owners) {
                                            $link = $this->url->build('/Owners/view/') . $house_owners['id'];
                                            echo '<td>';
                                            // echo '<a href="' . $link . '" target="_blank">' . $house_owners ['name_bn'] . '</a><br>';
                                            echo "<a href=\"#ownermodal\"  data-owner-name-bn ='" . $house_owners['name_bn'] . "' data-owner-id='" . $house_owners['id'] . "' class =\"ajax-owner-modal\"  data-toggle=\"modal\">" . $house_owners['name_bn'] . ",</a>";

                                            echo '</td>';

                                        }
                                    }
                                    ?>
                                    <td>
                                        <?php
                                        foreach ($result['owners'] as $building_owners) {
                                            $link = $this->url->build('/Owners/view/') . $building_owners['id'];

                                            //  echo '<a href="' . $link . '" target="_blank">' . $building_owners ['name_bn'] . ',';
                                            //  '</a><br>';

                                            echo "<a href=\"#ownermodal\"  data-owner-name-bn ='" . $building_owners['name_bn'] . "' data-owner-id='" . $building_owners['id'] . "' class =\"ajax-owner-modal\"  data-toggle=\"modal\">" . $building_owners['name_bn'] . ",</a>";

                                        }
                                        ?>
                                    </td>

                                </tr>

                            <?php }
                        }
                        ?>
                        </tbody>
                    </table>
                    <?= $this->Form->button(__('PrintPdf'), ['class' => 'btn blue pull-right', 'id' => 'print_in_pdf', 'style' => 'margin-top:40px']) ?>

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


<!--<a href="#myModal"  id ="ajax-sb" class="btn btn-lg btn-primary" data-toggle="modal">-->
<!--    Demo Modal</a>-->

<div id="ownermodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div id="owners">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div id="basicmodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div id="data">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<!-- plot modal-->


<div id="plot-info-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div id="plot-info">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
</div>


<script>

    $(document).ready(function () {
        var data_table_report = $('#report_table').DataTable({
            language: {
                "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Bangla.json"
            },
            dom: 'frtip',
            /// lengthMenu: [ 6, 25, 50, 75, 100 ],
            pageLength: 50,
           // orders: [[1, 'asc']]
        });

        $('#print_in_pdf').on('click', function () {
            var divToPrint = document.getElementById("report_table");
            var newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('<html><head><title>' + 'Amran' + '</title>');
            newWin.document.write('<link href="<?= $this->request->webroot; ?>assets/global/plugins/bootstrap/css/bootstrap.min.css"  rel="stylesheet"/>');
            newWin.document.write('</head><body>');
            newWin.print();
            newWin.close();
        })
    })
    ;
    $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
    $(document).ready(function () {

        $(document).on('click', '.ajax-owner-modal', function (e) {

            var $id = $(this).attr("data-owner-id");
            var $owner_name = $(this).attr("data-owner-name-bn");

            $("#owners").empty();
            $("#owners").load("<?php echo $this->request->webroot;?>/Owners/view/" + $id, function () {

                $(this).find('.page-bar').html("");
                $(this).find('.tools').html("");
                $(this).find('.caption').html("").html($owner_name);

            });

        });

        $(document).on('click', '.plot-info-modal', function (e) {

            var $id = $(this).attr("plot-id");
            var $plot_number = $(this).attr("data-plot-number-bn");

            $("#plot-info").empty();
            $("#plot-info").load("<?php echo $this->request->webroot;?>/Plots/view/" + $id, function () {

                $(this).find('.page-bar').html("");
                $(this).find('.tools').html("");
                $(this).find('.caption').html("").html($plot_number);

            });

        });

        $(document).on('click', '.ajax-basic-modal', function (e) {
            var $id = $(this).attr("data-property-id");
            var $property_name = $(this).attr("data-property-name");

            var $property_type = $(this).attr("data-type");

            if ($property_type == "house") {

                $("#data").empty();
                $("#data").load("<?php echo $this->request->webroot;?>/Houses/view/" + $id, function () {

                    $(this).find('.page-bar').html("");
                    $(this).find('.tools').html("");
                    $(this).find('.caption').html("").html($property_name);

                });
            }
            else {
                $("#data").empty();
                $("#data").load("<?php echo $this->request->webroot;?>/Apartments/view/" + $id, function () {

                    $(this).find('.page-bar').html("");
                    $(this).find('.tools').html("");
                    $(this).find('.caption').html("").html($property_name);

                });
            }
        });
    });


</script>

