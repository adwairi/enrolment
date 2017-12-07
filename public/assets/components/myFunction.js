

$(function() {

    $.extend( $.fn.dataTable.defaults, {
        autoWidth: true,
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            "sProcessing":   "Loading...",
            "sLengthMenu":   "Show _MENU_ entries",
            "sZeroRecords":  "No matching records found",
            "sInfo":         "Showing _START_ to _END_ of _TOTAL_ entries",
            "sInfoEmpty":    "Showing 0 to 0 of 0 entries",
            "sInfoFiltered": "(filtered from _MAX_ total entries)",
            "sInfoPostFix":  "",
            "sSearch":       "Search :",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "First",
                "sPrevious": "Previous",
                "sNext":     "Next",
                "sLast":     "Last"
            }
        }
    });

    var table = $('#workflow-table').DataTable({

        processing: true,
        serverSide: true,
        ajax: 'http://backoffice.knowmx/en/datatables',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'active', name: 'active' }
        ]
    });

    $('.datatable-ajax').on('click', 'tbody td', function() {

        var data = table.row(this).data();
        var id = data.id ;
        window.location = '/workflow/' + id;
    });
});
