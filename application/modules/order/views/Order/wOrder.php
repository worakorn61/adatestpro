

<div class="row">
    <div class="col-md-12">
        <!-- <div class="col-md-12">
            <div class="col-md-12" style="padding-top: 5px;"></div>

            <form class="xCNExample text-right" action="masUSRSearch" id="ofmSearch" name="ofmSearch" method="POST">
                <input type="text" placeholder="Start Date" id="dStartDate" name="dStartDate">
                <input type="text" placeholder="End Date" id="dEndDate" name="dEndDate">
                <input type="text" placeholder="Search.." name="tSearch" id="tSearch" style="width: 40%;">
                <button type="submit" id="obtSearch"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div> -->
        <div class="col-md-12" style="padding-top: 5px;"></div>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th class="text-center"><?php echo $this->lang->line("no"); ?></th>
                    <th class="text-center">Order Code</th>
                    <th class="text-center">Price Total</th>
                    <th class="text-center">Custumer</th>
                    <th class="text-center">List Product</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nNo = 1;
                foreach ($aOrder as $value) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $nNo; ?></td>
                        <td class="text-center"><?php echo $value['FTOrdCode']; ?></td>
                        <td class="text-center"><?php echo number_format($value['FNOrdPriceTotal'], 2); ?></td>
                        <td class="text-center"><?php echo $value['FTUrsName'] . ' ' . $value['FTUrsLastName']; ?></td>
                        <td class="text-center"><button type="button" id="obtListProduct" name="obtListProduct" onclick="JSxListProduct(<?php echo $value['FNOrdListPrdId']; ?>)" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button></td>
                    <?php $nNo++;
                } ?>
            </tbody>

        </table>

    </div>
</div>


<div class="modal fade" id="modalListProduct" name="modalListProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style=" background: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel">รายการสินค้า</h3>
            </div>
            <div class="modal-body">
                <div class="ShowListProduct"></div>
            </div>
        </div>
    </div>
</div>






<script type="text/javascript">
    $(function() {
        $("#dStartDate").datepicker();
        $("#dEndDate").datepicker();
    });

    function JSxListProduct(ListPrdId) {
        $.ajax({
            type: "POST",
            url: "masORDShowListProduct",
            data: {
                ListPrdId: ListPrdId
            },
            success: function(data) {
                $('#modalListProduct').modal('show');
                $('.ShowListProduct').html(data);
            }
        });
    }
</script>