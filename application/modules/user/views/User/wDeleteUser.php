<form role="form" id="ofmSaveDeleteUser" name="ofmSaveDeleteUser" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <?php echo $this->lang->line("do_you_want_to_delete"); ?>
    </div>
    <div class="form-group text-center">
        <input type="hidden" id="ohdIdUser" class="form-control" name="ohdIdUser" value="<?php echo $nId; ?>">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line("close"); ?></button>
        <button type="button" id="obtDeleteUser" class="btn btn-primary"><?php echo $this->lang->line("submit"); ?></button>
    </div>
</form>



<script type="text/javascript">
    $(document).ready(function() {
        $("#obtDeleteUser").click(function() {
            let ofmFormData = $('#ofmSaveDeleteUser').serializeArray();
            let ohdIdUser = $("#ohdIdUser").val();

            $.ajax({
                type: "POST",
                url: "masUSRSaveDeleteUser/" + ohdIdUser,
                data: ofmFormData,
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    window.location = "masUSRShowUser";
                }
            });

        });

    });
</script>