$(document).ready(function() {
    $('#dataTables').DataTable({
        "pageLength": 5, 
        "lengthMenu": [5, 10, 15, 20, 25, 50, 100],
        "stateSave": true,
    });
});