<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12" style="padding-top: 5px;"></div>
            <!-- <div class="col-md-8  text-right" style="padding-top: 5px;">
                <a href="masUSRPrint">Print</a>
            </div> -->
            <form class="xCNExample text-right" action="masUSRSearch" id="ofmSearch" name="ofmSearch" method="POST">
                <input type="text" placeholder="Start Date" id="odpStartDate" name="odpStartDate">
                <input type="text" placeholder="Start Time" id="otpStartTime" name="otpStartTime">
                <input type="text" placeholder="End Date" id="odpEndDate" name="odpEndDate">
                <input type="text" placeholder="End Time" id="otpEndTime" name="otpEndTime">
                <input type="text" placeholder="Search.." name="otpSearch" id="otpSearch" style="width: 40%;">
                <button type="submit" id="osmSearch"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div>
        <div class="col-md-12" style="padding-top: 5px;"></div>
        <table class="table table-striped" id="otbMyTable">
            <thead>
                <tr>
                    <th class="text-center"><?php echo $this->lang->line("no"); ?></th>
                    <th class="text-center"><?php echo $this->lang->line("fname"); ?></th>
                    <th class="text-center"><?php echo $this->lang->line("lname"); ?></th>
                    <th class="text-center"><?php echo $this->lang->line("gender"); ?></th>
                    <th class="text-center"><?php echo $this->lang->line("photo"); ?></th>
                    <th class="text-center"><?php echo $this->lang->line("create_date"); ?></th>
                    <th class="text-center"><?php echo $this->lang->line("update_date"); ?></th>
                    <th class="text-center"><?php echo $this->lang->line("edit"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nNo = 1;
                foreach ($aUser as $aValue) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $nNo; ?></td>
                        <td class="text-center"><?php echo $aValue['FTUrsName']; ?></td>
                        <td class="text-center"><?php echo $aValue['FTUrsLastName']; ?></td>

                        <?php
                        $tGen = '';
                        if ($aValue['FTUrsGender'] == 'male') {
                            $tGen = $this->lang->line("male");
                        } else if ($aValue['FTUrsGender'] == 'female') {
                            $tGen = $this->lang->line("female");
                        }
                        ?>
                        <td class="text-center"><?php echo  $tGen; ?></td>

                        <?php $tImg = '';

                        if (!$aValue['FTUrsImages'] == '') {
                            $tImg = $aValue['FTUrsImages'];
                        } else {
                            $tImg = 'no_img.png';
                        }
                        ?>
                        <td class="text-center"><img src="<?php echo base_url(); ?>application\images\img_user\<?php echo  $tImg; ?>" id="images" name="images" width="25" height="25"></td>
                        <td class="text-center"><?php echo $aValue['FDUrsCreateDate']; ?></td>
                        <td class="text-center"><?php echo $aValue['FDUrsUpdateDate']; ?></td>

                        <td class="text-center">
                            <button type="button" id="obtEdit_user" name="obtEdit_user" onclick="JSxEditUser(<?php echo $aValue['FNUrsId']; ?>)" class="btn btn-primary"><?php echo $this->lang->line("edit"); ?></button>
                            <button type="button" id="obtDelete_user" name="obtDelete_user" onclick="JSxDeleteUser(<?php echo $aValue['FNUrsId']; ?>)" class="btn btn-danger"><?php echo $this->lang->line("delete"); ?></button>

                        </td>

                    <?php $nNo++;
                } ?>
            </tbody>
        </table>

    </div>
</div>


<div class="modal fade" id="modalEditUser" name="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style=" background: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel"><?php echo $this->lang->line("edit_user"); ?></h3>
            </div>
            <div class="modal-body">
                <div class="ShowEditUser"></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-content panel-danger">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $this->lang->line("delete_user"); ?></h4> <!-- แจ้งเตือน-->
                </div>
                <div class="modal-body">
                    <d<div class="ShowDeleteUser">
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    $(function() {
        $("#odpStartDate").datepicker({
            dateFormat: "DD,dMM,yy"       
        });
        $("#odpEndDate").datepicker({
            dateFormat: "DD,dMM,yy",
        });

        $("#otpStartTime").timepicker({
            timeFormat: 'H:mm',
            interval: 30,
            minTime: '24',
            startTime: '06:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        $("#otpEndTime").timepicker({
            timeFormat: 'H:mm',
            interval: 30,
            minTime: '24',
            startTime: '06:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });

    function JSxEditUser(nId) {
        $.ajax({
            type: "POST",
            url: "masUSREditUser",
            data: {
                nId: nId
            },
            success: function(data) {
                $('#modalEditUser').modal('show');
                $('.ShowEditUser').html(data);
            }
        });
    }

    function JSxDeleteUser(nId) {
        $.ajax({
            type: "POST",
            url: "masUSRDeleteUser",
            data: {
                nId: nId
            },
            success: function(data) {
                $('#modalDelete').modal('show');
                $('.ShowDeleteUser').html(data);
            }
        });
    }
</script>