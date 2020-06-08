<form role="form" id="ofmSaveEditUser" name="ofmSaveEditUser" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="oetName"><?php echo $this->lang->line("fname"); ?></label>
        <input type="text" id="oetName" class="form-control" name="oetName" placeholder="Example: John" value="<?php echo $aUserById[0]['FTUrsName'] ?>">
    </div>
    <div class="form-group">
        <label for="oetLastName"><?php echo $this->lang->line("lname"); ?></label>
        <input type="text" id="oetLastName" class="form-control" name="oetLastName" placeholder="Example: Doe" value="<?php echo $aUserById[0]['FTUrsLastName'] ?>">
    </div>

    <div class=" form-group">
        <label for="gender"><?php echo $this->lang->line("gender"); ?></label>
        <?php $aGen = array(
            'male', 'female'
        );
        $tSel = '';
        ?>
        <select class="form-control" placeholder="Your Gender *" name="ocmGender" id="ocmGender">
            <option value="male" <?php if ($aGen[0] == $aUserById[0]['FTUrsGender']) {
                                        $tSel = 'selected';
                                        echo $tSel;
                                    } ?>><?php echo $this->lang->line("male"); ?></option>
            <option value="female" <?php if ($aGen[1] == $aUserById[0]['FTUrsGender']) {
                                        $tSel = 'selected';
                                        echo $tSel;
                                    } ?>><?php echo $this->lang->line("female"); ?></option>
        </select> </div>

    <div class="form-group text-center">
        <input type="hidden" id="ohdIdUser" class="form-control" name="ohdIdUser" value="<?php echo $aUserById[0]['FNUrsId']; ?>">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line("close"); ?></button>
        <button type="button" id="obtSaveEditUser" class="btn btn-primary"><?php echo $this->lang->line("submit"); ?></button>
    </div>
</form>



<script type="text/javascript">
    $(document).ready(function() {
        $("#obtSaveEditUser").click(function() {
            let ofmFormData = $('#ofmSaveEditUser').serializeArray();
            $.ajax({
                type: "POST",
                url: "masUSRSaveEditUser",
                data: ofmFormData,
                success: function(data) {
                    $('#modalEditUser').modal('hide');
                    window.location = "masUSRShowUser";
                }
            });

        });

    });
</script>