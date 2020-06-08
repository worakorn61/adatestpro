<?php

foreach ($aListImage as $value) {

?>
    <img id="oimProduct" name="oimProduct" src="<?php echo base_url(); ?>application\images\img_product\<?php echo  $value['FTImpName']; ?>" alt="..." class="img-thumbnail">

<?php } ?>