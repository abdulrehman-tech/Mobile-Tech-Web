<div class="clearfix"></div>
         <footer class="site-footer">
            <div class="footer-inner">
               <div class="row">
                  <div class="col-sm-12">
                     <div style="text-align: center;">
                        Copyright &copy; <?php echo date('Y')?> Abdul Rehman Web Developer
                     </div> 
                  </div>
               </div>
            </div>
         </footer>
      </div>
<!-- import script -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
 <script src="./assets/js/index.js"></script>


 <script>

 //del for Accounts   
 $(document).ready(function () {
   $('.delete_btn_account').click(function (e) { 
      e.preventDefault();
      var deleteid= $(this).closest("tr").find('.delete_account_id_value').val();
      // console.log(deleteid);
      swal({
         title: "Are you sure?",
         text: "Once deleted, you will not be able to recover this Data",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
         if (willDelete) {
           
            $.ajax({
               type: "POST",
               url: "./del_account.php",
               data: {
                  "delete_account_set": 1,
                  "delete_id": deleteid,
               },
               success: function (response) {
                     swal("Deleted!","User account Deleted Successfully.!",{
                        icon:"success",
                     }).then((result)=> {
                        location.reload();
                     });
               }
            });
         }
         });
   });
 });

 //del for categories
 $(document).ready(function () {
   $('.delete_btn_category').click(function (e) { 
      e.preventDefault();
      var deleteid= $(this).closest("tr").find('.delete_category_id_value').val();
      // console.log(deleteid);
      swal({
         title: "Are you sure?",
         text: "Once deleted, you will not be able to recover this Data",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
         if (willDelete) {
           
            $.ajax({
               type: "POST",
               url: "./del_category.php",
               data: {
                  "delete_category_set": 1,
                  "delete_id": deleteid,
               },
               success: function (response) {
                     swal("Deleted!","Category Deleted Successfully.!",{
                        icon:"success",
                     }).then((result)=> {
                        location.reload();
                     });
               }
            });
         }
         });
   });
 });

 //del for Products
 $(document).ready(function () {
   $('.delete_btn_product').click(function (e) { 
      e.preventDefault();
      var deleteid= $(this).closest("tr").find('.delete_product_id_value').val();
      // console.log(deleteid);
      swal({
         title: "Are you sure?",
         text: "Once deleted, you will not be able to recover this Data",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
         if (willDelete) {
           
            $.ajax({
               type: "POST",
               url: "./del_product.php",
               data: {
                  "delete_product_set": 1,
                  "delete_id": deleteid,
               },
               success: function (response) {
                     swal("Deleted!","product Deleted Successfully.!",{
                        icon:"success",
                     }).then((result)=> {
                        location.reload();
                     });
               }
            });
         }
         });
   });
 });

 //del for USERS
 $(document).ready(function () {
   $('.delete_btn_user').click(function (e) { 
      e.preventDefault();
      var deleteid= $(this).closest("tr").find('.delete_user_id_value').val();
      // console.log(deleteid);
      swal({
         title: "Are you sure?",
         text: "Once deleted, you will not be able to recover this Data",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
         if (willDelete) {
           
            $.ajax({
               type: "POST",
               url: "./del_user.php",
               data: {
                  "delete_user_set": 1,
                  "delete_id": deleteid,
               },
               success: function (response) {
                     swal("Deleted!","User Deleted Successfully.!",{
                        icon:"success",
                     }).then((result)=> {
                        location.reload();
                     });
               }
            });
         }
         });
   });
 });

 //del for contact us
 $(document).ready(function () {
   $('.delete_btn_contact').click(function (e) { 
      e.preventDefault();
      var deleteid= $(this).closest("tr").find('.delete_contact_id_value').val();
      // console.log(deleteid);
      swal({
         title: "Are you sure?",
         text: "Once deleted, you will not be able to recover this Data",
         icon: "warning",
         buttons: true,
         dangerMode: true,
         })
         .then((willDelete) => {
         if (willDelete) {
           
            $.ajax({
               type: "POST",
               url: "./del_contact.php",
               data: {
                  "delete_contact_set": 1,
                  "delete_id": deleteid,
               },
               success: function (response) {
                     swal("Deleted!","User Deleted Successfully.!",{
                        icon:"success",
                     }).then((result)=> {
                        location.reload();
                     });
               }
            });
         }
         });
   });
 });
 </script>
    <!-- end import script -->
  </body>
</html>