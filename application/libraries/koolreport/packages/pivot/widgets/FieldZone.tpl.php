<?php
    use \koolreport\core\Utility; 
    $class = Utility::get($this->cssClass, $zone . "Field", "");
    if (is_string($class)) $class = function() use ($class) {return $class;};
?>
<div class='krpmFieldDrop' data-field-drop=true>
    <?php 
    $o = 0; foreach ($mappedFields as $df) {
        $o += 1; ?>
        <span style='display:inline-block; white-space:nowrap'>

            <span class="krpmFieldDrop" style='padding:5px 3px;'
                data-field-drop=true data-field-order=<?= $o-1 ?> >
                &nbsp;</span>

            <span class="krpmField krpm<?= ucfirst($fieldsType[$o-1]) ?>Field btn
                    <?php echo $class($df); ?>" 
                data-field-type = "<?= $fieldsType[$o-1] ?>"
                data-field-name = "<?= $fields[$o-1] ?>"
                data-field-order = "<?= $o-1 ?>" >
                <?= $df ?>
                
                <?php 
                    $sort = strtolower($fieldsSort[$o - 1]);
                    $pos = strpos($sort, 'rowsortasc');
                    if ($pos !== false) { ?>
                        <i class="krpmSortIcon fa fa-long-arrow-up" aria-hidden="true"></i>
                <?php } ?>

                <?php 
                    $pos = strpos($sort, 'rowsortdesc');
                    if ($pos !== false) { ?>
                        <i class="krpmSortIcon fa fa-long-arrow-down" aria-hidden="true"></i>
                <?php } ?>

                <?php 
                    $pos = strpos($sort, 'columnsortasc');
                    if ($pos !== false) { ?>
                        <i class="krpmSortIcon fa fa-long-arrow-left" aria-hidden="true"></i>
                <?php } ?>

                <?php 
                    $pos = strpos($sort, 'columnsortdesc');
                    if ($pos !== false) { ?>
                        <i class="krpmSortIcon fa fa-long-arrow-right" aria-hidden="true"></i>
                <?php } ?>

                <?php if ($zone !== 'waiting') {?>
                    <i class="krpmDropDown fa fa-caret-down" aria-hidden="true"></i>
                <?php } ?>
            </span>

            <?php  if ($o === count($mappedFields)) { ?>
                <span class="krpmFieldDrop" style='padding:5px 3px;'
                    data-field-drop=true  data-field-order=<?= $o ?> >
                    &nbsp;</span>
            <?php } ?>

        </span>
    <?php } ?>
    <?php if (count($mappedFields) === 0) { ?>
        <span class='krpmField btn' style='border:0'>&nbsp;</span>
    <?php } ?>
</div>