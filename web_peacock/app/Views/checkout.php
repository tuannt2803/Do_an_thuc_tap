<?= $this->extend('_Layout') ?>
<?= $this->Section('content') ?>
<?php session_Start() ?>
<!-- START SECTION SHOP -->

<div class="section">
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <h2><b>ĐẶT HÀNG</b></h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <?php if ($message == "success") : ?>
                    <script>
                        localStorage.removeItem('cart');
                    </script>
                    <div class="alert alert-success">
                        <strong><b >Đặt hàng thành công! </b></strong> Vui lòng kiểm email để xem chi tiết đơn hàng hoặc vào phần đơn hàng ở giở hàng.
                        <br>
                       Chọn <strong><a href="<?= base_url() ?>/guide"><b> Hướng dẫn thanh toán</b></a> </strong> để xem cách thức thanh toán Online.
                    </div>
                <?php elseif ($message == "fail") : ?>
                    <div class="alert alert-danger">
                        <strong><b>Đặt hàng không thành công !</b></strong> Vui lòng liên hệ email CSKH hoặc số điện thoại 0981173413 để thêm thông tin.
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="heading_s1">
                        <h4>Chi tiết đơn hàng</h4>
                    </div>
                    <form action="<?= base_url() ?>/checkout" method="post">
                        <div class="form-group">
                            <input type="text" required="" class="form-control" name="cName" placeholder="Họ và tên *">
                        </div>
                        <div class="form-group">
                            <input type="text" required="" class="form-control" name="cPhone" placeholder="Số điện thoại *">
                        </div>
                        <div class="form-group">
                            <input type="email" required="" class="form-control" name="cEmail" placeholder="Email *">
                        </div>

                        <div class="form-group">
                            <textarea type="text" class="form-control" name="cAddress" required="" placeholder="Địa chỉ chi tiết"></textarea>
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="notes" required="" placeholder="Ghi chú"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Thanh toán:</p>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" id="Online" name="cPay" value="0" checked>
                                <label for="Online">Online</label><br>                       
                            </div>
                             <div class="col-md-5">                
                                <input type="radio" id="offline" name="cPay" value="1">
                                <label for="offline">Khi nhận hàng</label><br>
                            </div>
                            
                        </div>

                </div>
                <div class="col-md-8">
                    <div class="order_review">
                        <div class="heading_s1">
                            <h4>Đơn hàng của bạn</h4>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Đơn giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tổng tiền</th>
                                        <td class="product-subtotal" id="subtotal">0</td>
                                    </tr>
                                    <tr>
                                        <th>Giao hàng</th>
                                        <td>Miễn phí</td>
                                    </tr>
                                    <tr>
                                        <th>Thanh toán</th>
                                        <td class="product-subtotal">0</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-fill-out btn-block" style="margin-top:30px">Đặt hàng</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

</div>
<?= $this->endSection('content') ?>
<?= $this->Section('_script') ?>
<script>
    const json = localStorage.getItem('cart');
    const checkout = JSON.parse(json);
    let subtotal = 0;
    checkout.map(el => {
        subtotal += +(el.price.split('.').join('')) * el.quantity;
    });
    subtotalValue = +subtotal;
    const listLI = checkout.map(el =>
        `
    <tr>       
        <td>${el.name} <span class="product-qty">x ${el.quantity}</span></td>
        <td>${(+el.price.split('.').join('')).toLocaleString('vn')}</td>
    </tr>
    `);
    const listProduct = checkout.map(el =>
        `
        <input type="hidden" name="productIds[]" value="${el.id}"/>
        <input type="hidden" name="productQuantities[]" value="${el.quantity}" />
        <input type="hidden" name="productPrices[]" value="${el.price.split('.').join('')}" />
    `);
    const listItem = document.querySelector('table > tbody');
    listItem.insertAdjacentHTML('beforeend', listLI);
    const subtotalDOM = document.querySelectorAll('.product-subtotal');
    const subtotalA = Array.from(subtotalDOM);
    subtotalA.map(el => {
        el.innerHTML = (Number.isNaN(subtotal)) ? 'Liên hệ' : subtotal.toLocaleString('vn');
    });
    const html = `<input type="hidden" name="subtotal" value=${subtotalValue}/>`;
    document.querySelectorAll('textarea')[document.querySelectorAll('textarea').length - 1].insertAdjacentHTML('afterend', listProduct + html);
</script>
<?= $this->endSection('_script') ?>