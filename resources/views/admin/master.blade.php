<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.admin_head')

    @yield('admin_head')
    <script src="{{ asset('js') }}/modernizr-3.6.0.min.js"></script>

</head>

<body>
        @yield('body')
    @include('includes.app_toast')
    
    {{-- <script src="{{ asset('js') }}/jquery-3.7.1.min.js"></script> --}}
    <script src="{{ asset('js') }}/plugins.js"></script>
    <script src="{{ asset('js') }}/popper.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js') }}/jquery.counterup.min.js"></script>
    <script src="{{ asset('js') }}/tailwind.min.js"></script>
    <script src="{{ asset('js') }}/select2.min.js"></script>
    <script src="{{ asset('js') }}/moment.min.js"></script>
    <script src="{{ asset('js') }}/jquery.waypoints.min.js"></script>
    <script src="{{ asset('js') }}/datepicker.min.js"></script>
    <script src="{{ asset('js') }}/jquery.scrollUp.min.js"></script>
    {{-- <script src="{{ asset('js') }}/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('js') }}/fullcalendar.min.js"></script>
    <script src="{{ asset('js') }}/Chart.min.js"></script>
    <script src="{{ asset('js') }}/main.js"></script>
    {{-- <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script> --}}

    <script>
        $(document).ready(function(){
            // nav link active as url
            let href = window.location.href;
            let anchor = $(`a.nav-link[href="${href}"]`);
            
            anchor.addClass('menu-active');
            anchor.parents('ul').addClass('sub-group-active');
        });
        
        // let table = new DataTable('table', {
        //     responsive: true
        // });
    </script><!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
$(document).ready(function () {

  var table = $('table').DataTable({
    responsive: true,
    dom: 'lBfrtip',
    lengthMenu: [[10,25,50,100,-1],[10,25,50,100,'All']],
    pageLength: 10,
    buttons: [
      { extend:'copy', text:'Copy', className:'btn btn-secondary btn-sm' },
      { extend:'csv', text:'CSV', className:'btn btn-primary btn-sm' },
      { extend:'excel', text:'Excel', className:'btn btn-success btn-sm' },
      { extend:'pdf', text:'PDF', className:'btn btn-danger btn-sm' },
      { extend:'print', text:'Print', className:'btn btn-warning btn-sm' },
      { extend:'colvis', text:'Columns', className:'btn btn-info btn-sm' }
    ]
  });

  // ------------------------
  // Single Column Filter
  // ------------------------
  var $filterWrap = $('.dataTables_filter');

  var $select = $('<select class="form-select form-select-sm" style="width:180px;"></select>');
  $select.append('<option value="">All Columns</option>');

  // Add column names
  $('thead th').each(function(index) {
    $select.append(<option value="${index}">${$(this).text()}</option>);
  });

  // Add dropdown
  $filterWrap.prepend($select);

  var selectedColumn = "";

  $select.on('change', function () {
    selectedColumn = $(this).val();
  });

  // Custom search
  $('.dataTables_filter input')
    .off('keyup')
    .on('keyup', function () {

      var value = this.value;

      if (selectedColumn === "") {
        table.columns().search('');
        table.search(value).draw();
      } else {
        table.search('');
        table.columns().search('');
        table.column(selectedColumn).search(value).draw();
      }
    });

});
</script>

    @include('includes.ajaxCalls')
    @include('includes.admin_js')
    @include('includes.script')
    @yield('js')
</body>

</html>
