<script>

//SaveAddTransaction
$(document).on('submit','#saveTransaction', function (e){
    e.preventDefault();

    var formData =new FormData(this);
    formData.append("save_Transaction", true);
    $.ajax({
        type: "POST",
        url: "supplier-code.php",
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
                $('#transactionAddModal').modal('hide');
                alertify.set('notifier','position','top-right');
                alertify.success(res.message);
                $('#myTable').load(location.href + " #myTable");
            }

        }

    });

              
  }
);
//update data
$(document).on('submit','#updateTransaction', function (e){
    e.preventDefault();

    var formData =new FormData(this);
    formData.append("update_Transaction", true);
    $.ajax({
        type: "POST",
        url: "supplier-code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response){

            var res = jQuery.parseJSON(response);
            if(res.status == 422){
                $('#errorMessageUpdate').removeClass('d-none');
                $('#errorMessageUpdate').text(res.message);
            }else 
            if(res.status == 200){
                $('#errorMessageUpdate').addClass('d-none');
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);
                $('#transactionEditModal').modal('hide');
                $('#updateTransaction')[0].reset();
                $('#myTable').load(location.href + " #myTable");  
               
                
            }
        }

    });            
  }
);

//retrieve data
$(document).on('click','.BtnEditTransaction', function (){
 var transaction_id = $(this).val();

$.ajax({
  type: "GET",
  url: "supplier-code.php?transaction_id=" + transaction_id,
  success: function (response){
    var res = jQuery.parseJSON(response);
    if(res.status == 422){
                alert(res.message);
            }else 
            if(res.status == 200){
                $('#transaction_id').val(res.data.id);
                $('#supplier').val(res.data.supplier);
                $('#contact_person').val(res.data.contact_person);
                $('#phone').val(res.data.phone);
                $('#email').val(res.data.email);
                $('#address').val(res.data.address);

                $('#transactionEditModal').modal('show');
            }
  }
});

});

//DeleteStundent
$(document).on('click','.BtnDeleteTransaction', function (e){
    e.preventDefault();

  if(confirm('Are you sure you want to delete this data?'))
  {
    var transaction_id = $(this).val();
    $.ajax({
      type: "POST",
      url: "supplier-code.php",
      data: {
        'delete_transaction':true,
        'transaction_id':transaction_id
      },
      success: function (response){
    var res = jQuery.parseJSON(response);
    if(res.status == 500){
                alert(res.message);
            }else
            {
                alertify.set('notifier','position','top-rigth');
                alertify.success(res.message);
                $('#myTable').load(location.href + " #myTable");
            }
  }
    

    });
    
  }

});

  </script>
