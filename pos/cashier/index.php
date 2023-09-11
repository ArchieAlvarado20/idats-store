<?php
require_once('partials/_head.php');
require_once('partials/_sidebar.php');
require_once('modals/cart-modal.php');
?>
<style>
  @import url('dist/css/brand-style.css');
</style>
<body>
    <!-- Main content -->
   
    <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <div class="content-wrapper">
  <section class="content-header">
  <?= alertMessage();?>
    <div class="container col-md-12">
      <div class="row">
        <div class="col-md-12">
        <div class="card shadow bg-white">
          <div class="card-header d-flex">
          <div class="col-sm-8 mt-4">
          <p style="font-weight:bolder; font-size: 60px; padding-left:500px; width: 1000px;"><span id="time"></span>.</p>
          <h4 class="fw-bold">Transaction No.: &nbsp; <strong>00000000000000</strong></h4>
          </div>
          <div class="col-sm-4 text-right mt-4">
            <h1 style="font-size: 70px; font-weight:bolder;">00:00</h1>  
          </div>
          </div>

            <div class="card-body d-flex">
              <div class="col-sm-10">
            <table id="myTable_cart" class="table table-sm table-bordered table-striped table-hover">
                  <thead class="bg-light">
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Pcode</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Discount</th>
                    <th class="text-center">Total</th>
                    <th class="text-center"> </th>

               
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $users = "SELECT * FROM vw_sold_items WHERE status='Pending'";
                   $users_run = mysqli_query($con,$users);
                   if(mysqli_num_rows($users_run) > 0 )
                   {
                       foreach($users_run as $transaction)
                       {
                        $total = ($transaction['price'] * $transaction['qty']);
                          ?>
                            <tr>
                            <td class="text-center" style="font-weight:bolder"><?= $transaction['id'] ?></td>
                              <td class="text-center"><?= $transaction['pcode'] ?></td>
                              <td class="text-center"><?= $transaction['description'] ?></td>
                              <td class="text-center"><?= $transaction['price'] ?></td>
                              <td class="text-center"><?= $transaction['qty'] ?></td>
                              <td class="text-center"><?= $transaction['disc'] ?></td>
                              <td class="text-center"><?= $total ?></td>
                              <td class="" style="width:25px;">
                              <a href="cart-code.php?id=<?= $transaction['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')" ><i class="fa fa-times"></i></a>
                              </td>
                         
                            </tr>
                         
                            
                          <?php
                        }
                      }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>   
                  </tr>
                  </tfoot>
                    </table>
            </div>
          <div class="price-panel col-sm-2 mt-0 bg-secondary">
            <div class="card-body ">
            <?php
               $query = "SELECT COUNT(*) AS count FROM tblproduct";
               $query_result = mysqli_query($con, $query);
               while($row = mysqli_fetch_assoc($query_result))
               {
                 $count = $row['count'];
               }
               $query = "SELECT sum(price) AS price FROM tblcart";
               $query_result = mysqli_query($con, $query);
               while($row = mysqli_fetch_assoc($query_result))
               {
                 $sub_total = $row['price'];
               }
               $query = "SELECT sum(qty) AS qty FROM tblcart";
               $query_result = mysqli_query($con, $query);
               while($row = mysqli_fetch_assoc($query_result))
               {
                 $items = $row['qty'];
               }
               $query = "SELECT COUNT(*) AS stock FROM tblstock";
               $query_result = mysqli_query($con, $query);
               while($row = mysqli_fetch_assoc($query_result))
               {
                 $stock = $row['stock'];
               }
               
               ?>
                      <div class="row">
                      <div class="col-sm-9">
                        <div class="mb-1 ">
                        <label class="d-flex">Sub-total  </label>
                        </div>
                      <br/>
                      <div class="mb-1 ">
                        <label class="d-flex">Discount  </label>
                        </div>
                      <br/>
                      <div class="mb-1 ">
                        <label class="d-flex">VAT </label>
                        </div>
                      <br/>
                      <div class="mb-1 ">
                        <label class="d-flex">Vatable  </label>
                        </div>
                      <br/>
                      <div class="mb-1 ">
                        <label class="d-flex">Total </label>
                        </div>
                        <br/>
                        <div class="mb-1 ">
                        <label class="d-flex">Total Items </label>
                        </div>
                      
                      </div>
                      <div class="col-sm-3">
                        <div class="mb-0 ">
                        <label class="ms-5"><?=$sub_total;?></label>
                        </div>
                      <br/>
                      <div class="mb-0 ">
                        <label class="ms-5">00:00</label>
                        </div>
                      <br/>
                      <div class="mb-0 ">
                        <label class="ms-5">00:00</label>
                        </div>
                      <br/>
                      <div class="mb-0">
                        <label class="">00:00</label>
                        </div>
                      <br/>
                      <div class="mb-0 ">
                        <label class="ms-5 float-end">00:00</label>
                        </div>
                      <br/>
                      <div class="mb-0 ">
                        <label class="ms-5 float-end"><?=$items;?></label>
                        </div>
                      </div>
          
                      </div>
            </div>
            </div>

          </div>
            </div>
          </div>

        </div>
      </div>
      
    </div>
	
    
    </section>
    </div>
    </div>
</body>

    <?php require_once('partials/_footer.php'); ?>


  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
  <script>
    //SaveAddTransaction
 $(document).on('submit','#saveTransaction', function (e){
    e.preventDefault();

    var formData =new FormData(this);
    formData.append("cart", true);
    $.ajax({
        type: "POST",
        url: "cart-code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response){

            var res = jQuery.parseJSON(response);
            if(res.status == 422){
                $('#errorMessage').removeClass('d-none');
                $('#errorMessage').text(res.message);
            }else 
            if(res.status == 200){
                $('#errorMessage').addClass('d-none');
                $('#saveTransaction')[0].reset();
                $('#stock-add-modal').modal('show');
                alertify.set('notifier','position','top-right');
                alertify.success(res.message);
                $('#myTable_cart').load(location.href + " #myTable_cart");  
            }

        }

    });

              
  }
);

    //fade-out alert
$('.alert').show();
setTimeout(function() {
    $('.alert').fadeOut(400);
}, 5000);

 //data table script cart
 $(document).ready(function(){
    $('#myTable_cart').DataTable({
      "order": [[ 0, 'desc' ], [ 1, 'desc' ]],
      "pagingType": "full_numbers",
      "lengthMenu":[
        [ -1],
        [ "All"],
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search here...",
      }
    })
  });
 //data table script modal
  $(document).ready(function(){
    $('#myTable_modal').DataTable({
      "order": [[ 0, 'desc' ], [ 1, 'desc' ]],
      "pagingType": "full_numbers",
      "lengthMenu":[
        [10, 25, 50, -1],
        [10, 25, 50, "All"],
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search here...",
      }
    })
  });
//live time
function refreshTime() {
  const timeDisplay = document.getElementById("time");
  const dateString = new Date().toLocaleString();
  const formattedString = dateString.replace(", ", " - ");
  timeDisplay.textContent = formattedString;
}
  setInterval(refreshTime, 100);

//   `use strict`
// var datetime = new Date().toDateString();
// console.log(datetime); // it will represent date in the console of developer tool
// document.getElementById("time").textContent = datetime; // represent on html page



</script>






