$(document).ready(function() {
    $('#tableId').DataTable()
      .columns.adjust()
      .responsive.recalc();
})