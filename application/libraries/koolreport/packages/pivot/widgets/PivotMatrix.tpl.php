<?php
    use \koolreport\core\Utility; 
    $numDF = count($dataFields) > 0 ? count($dataFields) : 1;
    // print_r($rowNodes); echo '<br><br>';
    // print_r($rowNodesMark);
    $chClass = Utility::get($this->cssClass, "columnHeader", "");
    if (is_string($chClass)) $chClass = function() use ($chClass) {return $chClass;};
    $rhClass = Utility::get($this->cssClass, "rowHeader", "");
    if (is_string($rhClass)) $rhClass = function() use ($rhClass) {return $rhClass;};
    $dcClass = Utility::get($this->cssClass, "dataCell", "");
    if (is_string($dcClass)) $dcClass = function() use ($dcClass) {return $dcClass;};
?>
<div id="<?=$uniqueId?>" class='krPivotMatrix animated'
        style="width:<?= $width ?>; height:<?= $height ?>; 
        overflow: hidden; visibility: hidden;
        animation-duration: 0.5s;">
    
    <table class='table'>
        <colgroup>
            <col>
            <col>
        </colgroup>
        <tbody>
            <tr>
                <td class='krpmFieldZone krpmWaitingFieldZone' 
                    data-zone="waiting" colspan=2 >
                    <?php
                        $zone = "waiting";
                        $mappedFields = $mappedWaitingFields;
                        $fieldsType = $waitingFieldsType;
                        $fieldsSort = $waitingFieldsSort;
                        $fields = $waitingFields;
                        include "FieldZone.tpl.php";
                    ?>
                </td>
            </tr>
            <tr>
                <td class='krpmFieldZone krpmDataFieldZone'
                    data-zone="data" >
                    <?php
                        $zone = "data";
                        $mappedFields = $mappedDataFields;
                        $fieldsType = $dataFieldsType;
                        $fieldsSort = $dataFieldsSort;
                        $fields = $dataFields;
                        include "FieldZone.tpl.php";
                    ?>
                </td>
                <td class='krpmFieldZone krpmColumnFieldZone' 
                    data-zone="column" colspan=1 >
                    <?php
                        $zone = "column";
                        $mappedFields = $mappedColFields;
                        $fieldsType = $columnFieldsType;
                        $fieldsSort = $columnFieldsSort;
                        $fields = $colFields;
                        include "FieldZone.tpl.php";
                    ?>
                </td>
            </tr>
            <tr>
                <td class='krpmFieldZone krpmRowFieldZone'
                    data-zone="row" >
                    <?php
                        $zone = "row";
                        $mappedFields = $mappedRowFields;
                        $fieldsType = $rowFieldsType;
                        $fieldsSort = $rowFieldsSort;
                        $fields = $rowFields;
                        include "FieldZone.tpl.php";
                    ?>
                </td>
                <td class='krpmColumnHeaderZone'>
                    <?php include "ColumnHeaders.tpl.php"; ?>
                </td>
            </tr>
            <tr>
                <td class='krpmRowHeaderZone' >
                    <?php include "RowHeaders.tpl.php"; ?>
                </td>
                <td class='krpmDataZone' colspan=1>
                    <?php include "DataCells.tpl.php" ?>
                </td>
            </tr>
            <tr class='krpmTrFooter'>
                <td class='krpmFooter'
                    colspan=<?= count($rowFields) + count($colIndexes) * $numDF; ?>>
                    <span id='krpmPagination'></span>
                    <span style='margin-left:10px'>Page size: </span>
                    <select id='krpmPageSizeSelect' class="form-control krpmPageSize">
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div id="krpmDisabler" style="display: none" >
        <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
    </div>
    <div id="krpmColumnFieldMenu" class="krpmFieldMenu" tabindex="0" 
        style="display: none;">
        <div class='krpmMenuItem' data-command='expand'>Expand All
            <i class='fa fa-plus-square-o' aria-hidden='true'></i></div>
        <div class='krpmMenuItem' data-command='collapse'>Collapse All
            <i class='fa fa-minus-square-o' aria-hidden='true'></i></div>
        <div class='krpmMenuItem' data-command='sort-asc'>Sort Asc
            <i class="krpmSortIcon fa fa-long-arrow-left" aria-hidden="true"></i></div>
        <div class='krpmMenuItem' data-command='sort-desc'>Sort Desc
            <i class="krpmSortIcon fa fa-long-arrow-right" aria-hidden="true"></i></div>
    </div>
    <div id="krpmRowFieldMenu" class="krpmFieldMenu" tabindex="0" 
        style="display: none;">
        <div class='krpmMenuItem' data-command='expand'>Expand All
            <i class='fa fa-plus-square-o' aria-hidden='true'></i></div>
        <div class='krpmMenuItem' data-command='collapse'>Collapse All
            <i class='fa fa-minus-square-o' aria-hidden='true'></i></div>
        <div class='krpmMenuItem' data-command='sort-asc'>Sort Asc
            <i class="krpmSortIcon fa fa-long-arrow-up" aria-hidden="true"></i></div>
        <div class='krpmMenuItem' data-command='sort-desc'>Sort Desc
            <i class="krpmSortIcon fa fa-long-arrow-down" aria-hidden="true"></i></div>
    </div>
    <div id="krpmDataFieldMenu" class="krpmFieldMenu" tabindex="0" 
        style="display: none;">
        <div class='krpmMenuItem' data-command='sort-asc-row'>Sort Row Asc
            <i class="krpmSortIcon fa fa-long-arrow-up" aria-hidden="true"></i></div>
        <div class='krpmMenuItem' data-command='sort-desc-row'>Sort Row Desc
            <i class="krpmSortIcon fa fa-long-arrow-down" aria-hidden="true"></i></div>
        <div class='krpmMenuItem' data-command='sort-asc-column'>Sort Column Asc
            <i class="krpmSortIcon fa fa-long-arrow-left" aria-hidden="true"></i></div>
        <div class='krpmMenuItem' data-command='sort-desc-column'>Sort Column Desc
            <i class="krpmSortIcon fa fa-long-arrow-right" aria-hidden="true"></i></div>
    </div>
    <input name="koolPivotConfig" class='krpmConfig' type='hidden' value='<?= htmlspecialchars(json_encode($config), ENT_QUOTES); ?>'/>
    <input name="koolPivotViewstate" class='krpmViewstate' type='hidden' value='<?= json_encode($viewstate); ?>'/>
    <input name="koolPivotScope" class='krpmScope' type='hidden' value='<?= json_encode($scope); ?>'/>
    <input name="koolPivotCommand" class='krpmCommand' type='hidden' />
</div>
<?php
    // print_r($isTotalColumn); echo '<br><br>';
    // print_r($mappedColNodes);
?>
<script type='text/javascript'>
    var <?=$uniqueId?>_init = {
        uniqueId: "<?=$uniqueId?>",
        colCollapseLevels: <?=json_encode($colCollapseLevels);?>,
        rowCollapseLevels: <?=json_encode($rowCollapseLevels);?>,
        clientEvents: <?=json_encode($clientEvents);?>,
    }
    // if (! KoolReport.<?=$uniqueId?>)
        KoolReport.<?=$uniqueId?> = KoolReport.newPivotMatrix();
    KoolReport.<?=$uniqueId?>.initPivot(<?=$uniqueId?>_init);
</script>
