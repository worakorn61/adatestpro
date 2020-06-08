<table class="table table-striped" id="myTable">
    <thead>
        <tr>
            <th class="text-center"><?php echo $this->lang->line("no"); ?></th>
            <th class="text-center">Name</th>
            <th class="text-center">Age</th>
            <th class="text-center">Salary</th>
            <th class="text-center">Create Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($aAPIData['data'] as $value) {
        ?>
            <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td class="text-center"><?php echo $value['name']; ?></td>
                <td class="text-center"><?php echo $value['age']; ?></td>
                <td class="text-center"><?php echo number_format($value['salary'], 0); ?></td>
                <td class="text-center"><?php echo $value['created']; ?></td>

            <?php $i++;
        } ?>
    </tbody>
</table>