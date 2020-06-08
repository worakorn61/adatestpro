<style>
    .xCNHeaderBG {
        background: #333;
        padding: 5px;
        padding-right: 15px;
        color: #FFF;
    }
</style>
<div class="text-uppercase text-right">
</div>
<!-- <div style=" background: #333; padding: 5px; padding-right: 15px; color: #FFF;"> -->
<div class="xCNHeaderBG">
    <div>
        <div>
            <div class="col-md-6 text-left">
                <strong>Adasoft Test Pro</strong>

                <div>
                    <?php echo $this->lang->line("contact"); ?> : 088 - 659 -9564
                </div>
            </div>
            <div class="col-md-6  text-right" style="padding-top: 5px;">
                <a href="masLUGChangeThi"><img src="<?php echo base_url(); ?>application\images\img_icon\thailand.png" id="images" name="images" width="25" height="25"></a>
                <a href="masLUGChangeEng"><img src="<?php echo base_url(); ?>application\images\img_icon\england.png" id="images" name="images" width="25" height="25"></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-6 text-left" style="padding-top: 5px; color:darkgrey;">
            <button type="button" id="obtHome" name="obtHome" class="btn btn-light"><?php echo $this->lang->line("home"); ?></button>
            <button type="button" id="obtUser" name="obtUser" class="btn btn-light"><?php echo $this->lang->line("user"); ?></button>
            <button type="button" id="obtProduct" name="obtProduct" class="btn btn-light"><?php echo $this->lang->line("product"); ?></button>
            <button type="button" id="obtOrder" name="obtOrder" class="btn btn-light"><?php echo $this->lang->line("order"); ?></button>
        </div>
        <div class="col-md-6  text-right" style="padding-top: 5px;">
            <!-- <button type="button" id="obtLogin" name="obtLogin" class="btn btn-primary"><?php echo $this->lang->line("login"); ?></button> -->
            <button type="button" id="obtAPI" name="obtAPI" class="btn btn-danger">API</button>
            <button type="button" id="obtRegister" name="obtRegister" class="btn btn-warning"><?php echo $this->lang->line("register"); ?></button>
            <button type="button" id="obtHomeVariable" name="obtHomeVariable" class="btn btn-success">Variable</button>
            <button type="button" id="obtHomeObject" name="obtHomeObject" class="btn btn-primary">Object</button>

        </div>
    </div>

    <div class="clearfix"></div>
</div>

<div class="modal fade" id="modalRegister" name="modalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style=" background: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel"><?php echo $this->lang->line("register"); ?></h3>
            </div>
            <div class="modal-body">
                <div class="ShowAddUser"></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalLogin" name="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style=" background: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel"><?php echo $this->lang->line("login"); ?></h3>
            </div>
            <div class="modal-body">
                <div class="wrapper fadeInDown">
                    <div id="formContent">
                        <form id="ofmfFormLogin" action="masHOMLogin" method="post">
                            <input type="text" id="tUserName" class="fadeIn second" name="tUserName" placeholder="User">
                            <input type="text" id="tPassword" class="fadeIn third" name="tPassword" placeholder="Password">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Login <span class="glyphicon glyphicon-user " aria-hidden="true" data-toggle="tooltip"></span></button>
                                <button type="reset" class="btn btn-default">Close </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalAPI" name="modalAPI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style=" background: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel">API</h3>
            </div>
            <div class="modal-body">
                <div class="ShowAPI"></div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $("#obtRegister").on('click', function() {
            $.ajax({
                type: "POST",
                url: 'masUSRShowRegis',
                data: {

                },
                success: function(data) {
                    $('#modalRegister').modal('show');
                    $('.ShowAddUser').html(data);
                }
            });
        });

        $("#obtLogin").on('click', function() {
            $('#modalLogin').modal('show');
        });


        $("#obtHome").on('click', function() {
            window.location = "masHOMShowHome";
        });
        $("#obtUser").on('click', function() {
            window.location = "masUSRShowUser";
        });
        $("#obtProduct").on('click', function() {
            window.location = "masPRDShowProduct";
        });

        $("#obtOrder").on('click', function() {
            window.location = "masORDShowOrder";
        });

        $("#obtHomeObject").on('click', function() {
            window.location = "masHOMShowObject";
        });
        $("#obtHomeVariable").on('click', function() {
            window.location = "masHOMShowVariable";
        });


        $("#obtAPI").on('click', function() {
            //  window.location = "masHOMAPI";
            $.ajax({
                type: "POST",
                url: 'masHOMAPI',
                data: {

                },
                success: function(data) {
                    $('#modalAPI').modal('show');
                    $('.ShowAPI').html(data);
                }
            });
        });

    });
</script>