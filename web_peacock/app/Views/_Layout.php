<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title>PEACOCK - Nhom 8</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/public/client/assets/images/favicon.png">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="<?= base_url() ?>/public/client/assets/css.css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>/public/client/assets/css-1.css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/linearicons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/simple-line-icons.css">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/owlcarousel/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/magnific-popup.css">
    <!-- jquery-ui CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/jquery-ui.css">
    <!-- jquery-toast CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/jquery.toast.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/slick-theme.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/responsive.css">

    <!-- duong style -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/client/assets/css/dtd-custom-style.css">

</head>

<body>


    <?= $this->include('_header') ?>


    <!-- START SECTION BREADCRUMB -->

    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <?= $this->renderSection('content') ?>


    </div>
    <!-- END MAIN CONTENT -->

    <?= $this->include('_footer') ?>


    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
    <a href="#" class="scrollup scroll-cart" style="display: none;"><i class="linearicons-cart"></i></i><span class="cart_count scroll-cart-count"></span></a>

    <!-- Latest jQuery -->
    <script src="<?= base_url() ?>/public/client/assets/js/jquery-1.12.4.min.js"></script>
    <!-- jquery-ui -->
    <script src="<?= base_url() ?>/public/client/assets/js/jquery-ui.js"></script>
    <!-- popper min js -->
    <script src="<?= base_url() ?>/public/client/assets/js/popper.min.js"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="<?= base_url() ?>/public/client/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- owl-carousel min js  -->
    <script src="<?= base_url() ?>/public/client/assets/owlcarousel/js/owl.carousel.min.js"></script>
    <!-- magnific-popup min js  -->
    <script src="<?= base_url() ?>/public/client/assets/js/magnific-popup.min.js"></script>
    <!-- waypoints min js  -->
    <script src="<?= base_url() ?>/public/client/assets/js/waypoints.min.js"></script>
    <!-- parallax js  -->
    <script src="<?= base_url() ?>/public/client/assets/js/parallax.js"></script>
    <!-- countdown js  -->
    <script src="<?= base_url() ?>/public/client/assets/js/jquery.countdown.min.js"></script>
    <!-- imagesloaded js -->
    <script src="<?= base_url() ?>/public/client/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- isotope min js -->
    <script src="<?= base_url() ?>/public/client/assets/js/isotope.min.js"></script>
    <!-- jquery.dd.min js -->
    <script src="<?= base_url() ?>/public/client/assets/js/jquery.dd.min.js"></script>
    <!-- slick js -->
    <script src="<?= base_url() ?>/public/client/assets/js/slick.min.js"></script>
    <!-- isotope-loadmore js -->
    <script src="<?= base_url() ?>/public/client/assets/js/isotope-loadmore.js"></script>
    <!-- elevatezoom js -->
    <script src="<?= base_url() ?>/public/client/assets/js/jquery.elevatezoom.js"></script>
    <!-- toast js -->
    <script src="<?= base_url() ?>/public/client/assets/js/jquery.toast.min.js"></script>
    <?= $this->renderSection('_maps') ?>
    <!-- scripts js -->
    <script src="<?= base_url() ?>/public/client/assets/js/scripts.js"></script>

    <!-- cart js -->
    <script src="<?= base_url() ?>/public/client/assets/cart-handler.js"></script>
    <?= $this->renderSection('_script') ?>
    <script type="text/javascript">
              getPagination('#table-id');
                    //getPagination('.table-class');
                    //getPagination('table');

          /*                    PAGINATION 
          - on change max rows select options fade out all rows gt option value mx = 5
          - append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
          - each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
          - fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
          - fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
          */
         

function getPagination(table) {
  var lastPage = 1;

  $('#maxRows')
    .on('change', function(evt) {
      //$('.paginationprev').html('');                      // reset pagination

     lastPage = 1;
      $('.pagination')
        .find('li')
        .slice(1, -1)
        .remove();
      var trnum = 0; // reset tr counter
      var maxRows = parseInt($(this).val()); // get Max Rows from select option

      if (maxRows == 5000) {
        $('.pagination').hide();
      } else {
        $('.pagination').show();
      }

      var totalRows = $(table + ' tbody tr').length; // numbers of rows
      $(table + ' tr:gt(0)').each(function() {
        // each TR in  table and not the header
        trnum++; // Start Counter
        if (trnum > maxRows) {
          // if tr number gt maxRows

          $(this).hide(); // fade it out
        }
        if (trnum <= maxRows) {
          $(this).show();
        } // else fade in Important in case if it ..
      }); //  was fade out to fade it in
      if (totalRows > maxRows) {
        // if tr total rows gt max rows option
        var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
        //  numbers of pages
        for (var i = 1; i <= pagenum; ) {
          // for each page append pagination li
          $('.pagination #prev')
            .before(
              '<li data-page="' +
                i +
                '">\
                                  <span>' +
                i++ +
                '<span class="sr-only">(current)</span></span>\
                                </li>'
            )
            .show();
        } // end for i
      } // end if row count > max rows
      $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
      $('.pagination li').on('click', function(evt) {
        // on click each page
        evt.stopImmediatePropagation();
        evt.preventDefault();
        var pageNum = $(this).attr('data-page'); // get it's number

        var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

        if (pageNum == 'prev') {
          if (lastPage == 1) {
            return;
          }
          pageNum = --lastPage;
        }
        if (pageNum == 'next') {
          if (lastPage == $('.pagination li').length - 2) {
            return;
          }
          pageNum = ++lastPage;
        }

        lastPage = pageNum;
        var trIndex = 0; // reset tr counter
        $('.pagination li').removeClass('active'); // remove active class from all li
        $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
        // $(this).addClass('active');                  // add active class to the clicked
        limitPagging();
        $(table + ' tr:gt(0)').each(function() {
          // each tr in table not the header
          trIndex++; // tr index counter
          // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
          if (
            trIndex > maxRows * pageNum ||
            trIndex <= maxRows * pageNum - maxRows
          ) {
            $(this).hide();
          } else {
            $(this).show();
          } //else fade in
        }); // end of for each tr in table
      }); // end of on click pagination list
      limitPagging();
    })
    .val(5)
    .change();

  // end of on select change

  // END OF PAGINATION
}

function limitPagging(){
    // alert($('.pagination li').length)

    if($('.pagination li').length > 7 ){
            if( $('.pagination li.active').attr('data-page') <= 3 ){
            $('.pagination li:gt(5)').hide();
            $('.pagination li:lt(5)').show();
            $('.pagination [data-page="next"]').show();
        }if ($('.pagination li.active').attr('data-page') > 3){
            $('.pagination li:gt(0)').hide();
            $('.pagination [data-page="next"]').show();
            for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
                $('.pagination [data-page="'+i+'"]').show();

            }

        }
    }
}

// $(function() {
  // // Just to append id number for each row
  // $('table tr:eq(0)').prepend('<th> STT </th>');

  // var id = 0;

  // $('table tr:gt(0)').each(function() {
    // id++;
    // $(this).prepend('<td>' + id + '</td>');
  // });
// });

//  Developed By Yasser Mas
// yasser.mas2@gmail.com

</script>

	<script type="text/javascript" src="<?= base_url() ?>/public/bill/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/public/bill/js/script.js"></script>
</body>

</html>