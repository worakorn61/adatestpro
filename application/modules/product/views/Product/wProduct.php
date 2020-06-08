<div class="row">
    <div class="col-md-12">
        <!-- <div class="col-md-12">
            <div class="col-md-12" style="padding-top: 5px;"></div> -->
            <!-- <div class="text-right" style=" padding-bottom:10px;">
                <button type="button" id="obtAddProduct" name="obtAddProduct" class="btn btn-warning">เพิ่มสินค้า</button>
            </div> -->
            <!-- <form class="xCNExample text-right" action="masUSRSearch" id="ofmSearch" name="ofmSearch" method="POST">
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
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">List Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nNo = 1;
                foreach ($aProduct as $value) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $nNo; ?></td>
                        <td class="text-center"><?php echo $value['FTPrdName']; ?></td>
                        <td class="text-center"><?php echo number_format($value['FNPrdPrice'], 2); ?></td>
                        <td class="text-center">


                            <button type="button" id="obtListImage" name="obtListImage" onclick="JSxListImage(<?php echo $value['FNPrdId']; ?>)" class="btn btn-info">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>

                        </td>

                    <?php $nNo++;
                } ?>
            </tbody>
        </table>

    </div>
</div>


<div class="modal fade" id="modalListImage" name="modalListImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style=" background: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel">Image</h3>
            </div>
            <div class="modal-body">
                <div class="ShowListImage"></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modaAddProduct" name="modaAddProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style=" background: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel">Add Product</h3>
            </div>
            <div class="modal-body">
                <!-- <div class="ShowAddProduct"></div> -->

                <form role="form" id="ofmSaveAddProduct" name="ofmSaveAddProduct" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="oetProductName">Product Name</label>
                        <input type="text" id="oetProductName" class="form-control" name="oetProductName">
                    </div>
                    <div class="form-group">
                        <label for="oetPrice">Price</label>
                        <input type="text" id="oetPrice" class="form-control" name="oetPrice">
                    </div>
                    <div class="form-group">
                        <input type="file" accept="image/png, image/jpeg, image/gif" id="oflSaveUploadProduct" name="oflSaveUploadProduct[]" class="file_upload" multiple source="">
                    </div>
                    <div class="form-group text-center">
                        <!-- <button type="submit" class="btn btn-primary btn-lg" id="submitbtn" name="submit"><?php echo $this->lang->line("signup"); ?></button> -->
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line("close"); ?></button>
                        <button type="button" id="obtSaveAddProduct" class="btn btn-primary"><?php echo $this->lang->line("submit"); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    $(function() {
        $("#dStartDate").datepicker();
        $("#dEndDate").datepicker();
    });

    function JSxListImage(nPrdId) {
        $.ajax({
            type: "POST",
            url: "masPRDShowListImage",
            data: {
                nPrdId: nPrdId
            },
            success: function(data) {
                $('#modalListImage').modal('show');
                $('.ShowListImage').html(data);
            }
        });
    }


    $("#obtAddProduct").on('click', function() {
        $('#modaAddProduct').modal('show');
    });


    $(document).ready(function() {
        $("#obtSaveAddProduct").click(function() {
            let ofmFormData = $('#ofmSaveAddProduct').serializeArray();
            $.ajax({
                type: "POST",
                url: "masUSRSaveAddProduct",
                data: ofmFormData,
                success: function(data) {
                    $('#modaAddProduct').modal('hide');
                    window.location = "masUSRShowUser";
                }
            });

        });

    });
</script>