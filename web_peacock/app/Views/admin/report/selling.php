<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>$title</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
   
</head>
<body>

<?php if ($message == "success") : ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" id="export_button" class="btn btn-success btn-sm">Xuất file excel</button>
                <br></br>
                <div class="table-responsive" id="employee_table">
                    <table id="example23" class="table table-striped">
                        <?php
                        session_start();
                        ?>
                        <thead>
                            <tr class="noExl">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng bán ra</th>
                                <th>Doanh thu</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $stt = 0;
                                  $total =0;
                             ?>
                            <?php foreach ($selling as $row) : ?>
                                <?php $stt = $stt + 1; ?>
                                <?php $total = $total + (int)$row['total_price'] * (int)$row['price']; ?>
                                <tr class="obj-item"> 
                                    <td><?= $stt; ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['product_amount'] ?></td>
                                    <td><?=number_format((int)$row['product_amount'] * (int)$row['price']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                           <!--  <div class="pull-right m-t-30 text-right">       
                                <h3><b>Tổng doanh thu: </b> <span style="color:red;"><?=number_format($total)?>  VND</span></h3>
                            </div> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php elseif ($message == "fail") : ?>
    <div class="alert alert-danger">
        <strong>Bạn không có quyền!</strong> 
    </div>
<?php endif; ?>
<!-- ============================================================== -->
<!-- End Page Content -->

</body>
</html>
<script >
       function html_table_to_excel(type)
    {
        var data = document.getElementById('example23');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, 'Ban_chay.' + type);
    }

    const export_button = document.getElementById('export_button');

    export_button.addEventListener('click', () =>  {
        html_table_to_excel('xlsx');
    });
   </script>
<?= $this->endSection() ?>