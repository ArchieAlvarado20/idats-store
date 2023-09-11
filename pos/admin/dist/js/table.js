//data table script
$(document).ready(function(){
    $('#myTable').DataTable({
      "order": [[ 0, 'desc' ], [ 1, 'desc' ]],
      "pagingType": "full_numbers",
      "lengthMenu":[
        [15, 25, 50, -1],
        [15, 25, 50, "All"],
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search here...",
     
      }
    })
  });

