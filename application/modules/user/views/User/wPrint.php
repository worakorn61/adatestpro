<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style type="text/css">
        body {
            font-family: myFirstFont2;
            font-size: 14px;
        }

        #page_wrape {
            height: 21cm;
            width: 14.8cm;
            margin: 0 auto;
        }


        @media print {

            #idprint {
                display: none;
            }

            #page_wrape {
                height: auto;
            }

            @page {
                size: A4;
                margin: 0;
            }
        }
    </style>
</head>

<body style=" padding: 0; margin: 0;">
    <div style=" text-align: center;">
        <input type="image" id="idprint" width="43" height="43" onClick="print_bill();" title="พิมพ์" />
        <?php
        foreach ($aUser as $value) {
        ?>
            <div id="page_wrape">
                <div style=" padding: 0px;">
                    <div class="header">
                        <table class="table table-striped" id="myTable">
                            <tbody>
                                <tr>
                                    <td class="text-center"><?php echo 'fff'; ?></td>
                                    <td class="text-center"><?php echo $value['FTUrsName']; ?></td>
                                    <td class="text-center"><?php echo $value['FTUrsLastName']; ?></td>
                        </table>
                    </div>
                </div>

            </div>
            <div style="page-break-before:always;"></div>
        <?php
        }
        ?>
    </div>

    <script language="javascript">
        function print_bill() {
            window.print();
        }
    </script>
</body>

</html>