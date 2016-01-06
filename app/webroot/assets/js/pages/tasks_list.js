/* ------------------------------------------------------------------------------
*
*  # Task list view
*
*  Specific JS code additions for task_manager_list.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */


$(function() {


    // Table setup
    // ------------------------------

    // Initialize data table
    $('.tasks-list').DataTable({
        autoWidth: false,
        columnDefs: [
            {
                type: "natural",
                width: '20px',
                targets: 0
            },
            {
                visible: false,
                targets: 1
            },
            {
                width: '70%',
                targets: 2
            },
            {
                width: '5%',
                orderDataType: 'dom-text',
                type: 'string',
                targets: 4
            },
            {
                width: '5%',
                orderDataType: 'dom-text',
                type: 'string',
                targets: 5
            },
            {
                orderable: false,
                width: '15%'
            }
        ],
        order: [[ 0, 'desc' ]],
        dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filtro:</span> _INPUT_',
            lengthMenu: '<span>Itens por página:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        lengthMenu: [ 15, 25, 50, 75, 100 ],
        displayLength: 15,
        drawCallback: function (settings) {
            var api = this.api();
            var rows = api.rows({page:'current'}).nodes();
            var last=null;
 
            // Grouod rows
            api.column(1, {page:'current'}).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr class="active border-double"><td colspan="8" class="text-semibold">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            });

            // Select2
            $('.select').select2({
                width: '150px',
                minimumResultsForSearch: Infinity
            });

            // Reverse last 3 dropdowns orientation
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function(settings) {

            // Reverse last 3 dropdowns orientation
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');

            // Destroy Select2
            $('.select').select2().select2('destroy');
        }
    });



    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Procurar por...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
    
});
