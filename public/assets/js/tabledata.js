$('#data-jurusan').DataTable({
    responsive: true,
    paging: false,
    bInfo: false,
});

$('#data-kelas').DataTable({
    responsive: true,
    paging: false,
    bInfo: false,
});

$('#data-matpel').DataTable({
    responsive: true,
    paging: false,
    bInfo: false,
});

$('#data-siswa').DataTable({
    responsive: true,
    bInfo: false,
});
$('#data-siswa-mm').DataTable({
    responsive: true,
    bInfo: false,
});

$('#data-siswa-aph').DataTable({
    responsive: true,
    bInfo: false,
});

$('#data-siswa-akl').DataTable({
    responsive: true,
    bInfo: false,
});

$('#data-siswa-tbsm').DataTable({
    responsive: true,
    bInfo: false,
});

$('#data-siswa-tkro').DataTable({
    responsive: true,
    bInfo: false,
});

$('#data-siswa-export').DataTable({
    responsive: true,
    bInfo: false,
    dom: 'Bfrtip',
    buttons: [
        'excel', 'pdf', 'print'
    ],
});

$('#data-guru').DataTable({
    responsive: true,
    bInfo: false,
});

$('#data-guru-export').DataTable({
    responsive: true,
    bInfo: false,
    dom: 'Bfrtip',
    buttons: [
        'excel', 'pdf', 'print'
    ],
});

$('#data-guru-user').DataTable({
    responsive: true,
    bInfo: false,
    bPaginate: false,
});