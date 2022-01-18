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
                                <th>Mã sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Nhà cung cấp</th>
                                <th>Lượt xem</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($inventory as $row) : ?>
                                <tr class="obj-item"> 
                                    <td><?= $row['product_id'] ?></td>
                                    <td><?php if($row['category_id'] == 1 )  echo "Áo"; else if($row['category_id'] == 2 ) echo "Quần dài"; else if($row['category_id'] == 3 ) echo "Váy đầm"; else if($row['category_id'] == 4 ) echo "Túi xách"; else if($row['category_id'] == 5 ) echo "Giầy";else if($row['category_id'] == 6 ) echo "Ví"; else if($row['category_id'] == 7 ) echo "Kính"; else  echo "Vớ" ; ?>
                                    </td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['quantity'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td><?php if($row['supplier_id'] == 1 )  echo "GUCCI"; else if($row['supplier_id'] == 2 ) echo "LOUIS VUITTON"; else if($row['supplier_id'] == 3 ) echo "CHANEL"; else if($row['supplier_id'] == 4 ) echo "DIOR"; else echo "HERMES"; ?>
                                    </td>
                                    <td><?= $row['totalView'] ?></td>
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