<style>
    #total {
        text-align: right;
    }

    #myTableListProduct {
        border: 1px solid red;
        border-collapse: separate;
    }

    #myTableListProduct th,
    #myTableListProduct td {
        border: 1px solid #000;
    }
</style>

<table class="table table-striped" id="myTableListProduct">
    <thead>
        <tr>
            <th class="text-center"><?php echo $this->lang->line("no"); ?></th>
            <th class="text-center">Product Name</th>
            <th class="text-center">QTY</th>
            <th class="text-center">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nNo = 1;
        $nTotalPrice = 0;
        foreach ($aListProduct as $value) {
            $nTotalPrice += $value['FNOpdPrdPrice'];
        ?>
            <tr>
                <td class="text-center"><?php echo $nNo; ?></td>
                <td class="text-center"><?php echo $value['FTOpdPrdName']; ?></td>
                <td class="text-center"></td>
                <td class="text-right"><?php echo number_format($value['FNOpdPrdPrice'], 2); ?></td>

            <?php $nNo++;
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <th style="text-align:right;" colspan="3">Total :</th>
            <td id="total" class="text-center"><?php echo  number_format($nTotalPrice, 2); ?></td>
        </tr>
    </tfoot>
</table>