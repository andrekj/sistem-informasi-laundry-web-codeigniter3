const flashData = $('.flash-data').data('flashdata');
const judul = $('.judul').data('judul');


if ( flashData ){
    Swal.fire({
        title: 'Data ' + judul,
        text: 'Berhasil ' + flashData,
        icon: 'success'
    });
}

$('.tombol-hapus').on('click', function (e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin data ' + judul,
  text: 'akan dihapus',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Hapus Data!'
}).then((result) => {
  if (result.value) {
    document.location.href = href;
  }

    })

});

$('.tombol-selesai').on('click', function (e){

  e.preventDefault();
  const href1 = $(this).attr('href');

  Swal.fire({
      title: 'Apakah anda yakin data ' + judul,
text: 'telah selesai',
icon: 'question',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Selesai!'
}).then((result) => {
if (result.value) {
  document.location.href = href1;
}

  })

});