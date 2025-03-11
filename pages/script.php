<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/sparklines/sparkline.js"></script>
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.js"></script>







<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../inc/main.js"></script>
<script src="../dist/js/sweetalert2.all.min.js"></script>
<script src="../plugins/select2/js/select2.full.min.js"></script>



<script>
  $(document).ready(function() {



    // Prevent form submission on Enter key
    $('#supplyform').on('keypress', function(e) {
      if (e.key === "Enter") {
        e.preventDefault(); // Disable the default form submission on Enter
      }
    });

    // Handle form submit event
    $('#supplyform').on('submit', function(event) {
      const supplyType = $('input[name="supply_type"]');
      if (!supplyType.val().trim()) {
        event.preventDefault(); // Stop form submission
        alert('Supply type is required.');
        supplyType.focus(); // Focus the input field
      }
    });
  });

  $('.select2').select2()
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  $('.general_update').on('input', function() {
    Table = $(this).attr('data-table_db');
    Column = $(this).attr('data-column_up');
    Value = $(this).val();
    Condition = $(this).attr('data-condition');
    Identifier = $(this).attr('data-identifier');
    thefre = $(this).attr('data-reff_id');
    remid = $(this).attr('data-remarksid');
    $.ajax({
      url: 'general_update.php',
      type: 'POST',
      data: {
        table: Table,
        column: Column,
        value: Value,
        condition: Condition,
        identifier: Identifier
      },
      dataType: 'html'
    }).done(function(data) {
      // console.log(data);
      update_remarks('test'+Identifier);
      update_remaining('remaining'+thefre);
    });

  })
  function update_remarks(remark_class){
    inputis = $('.'+remark_class);
    Table = inputis.attr('data-table_db');
    Column = inputis.attr('data-column_up');
    Value = inputis.val();
    Condition = inputis.attr('data-condition');
    Identifier = inputis.attr('data-identifier');
    $.ajax({
      url: 'general_update.php',
      type: 'POST',
      data: {
        table: Table,
        column: Column,
        value: Value,
        condition: Condition,
        identifier: Identifier
      },
      dataType: 'html'
    }).done(function(data) {
      console.log(data);
    });

  }
  function update_remaining(remark_class){
    inputis = $('.'+remark_class);
    Table = inputis.attr('data-table_db');
    Column = inputis.attr('data-column_up');
    Value = inputis.val();
    Condition = inputis.attr('data-condition');
    Identifier = inputis.attr('data-identifier');
// alert(inputis);
    $.ajax({
      url: 'general_update.php',
      type: 'POST',
      data: {
        table: Table,
        column: Column,
        value: Value,
        condition: Condition,
        identifier: Identifier
      },
      dataType: 'html'
    }).done(function(data) {
      console.log(data);
    });

  }
</script>