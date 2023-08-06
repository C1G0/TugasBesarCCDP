$(document).ready(function () {
  const baseurl = "http://localhost/rpl2/public/";
  $("#tambah-provinsi").on("change", function () {
    let prov_id = $("#tambah-provinsi option:selected").val();
    $.ajax({
      url: baseurl + "dashboard/getKab",
      data: { id: prov_id },
      method: "post",
      dataType: "json",
      success: function (data) {
        let cb = $("#tambah-kota");
        cb.empty();
        cb.append($("<option></option>").val("").text("Pilih Kabupaten/Kota"));
        for (let i = 0; i < data.length; i++) cb.append($("<option></option>").val(data[i].kabupaten_kota_id).text(data[i].nama_kab));
      },
    });
  });
  $("#edit-provinsi").on("change", function () {
    let prov_id = $("#edit-provinsi option:selected").val();
    $.ajax({
      url: baseurl + "dashboard/getKab",
      data: { id: prov_id },
      method: "post",
      dataType: "json",
      success: function (data) {
        let cb = $("#edit-kota");
        cb.empty();
        cb.append($("<option></option>").val("").text("Pilih Kabupaten/Kota"));
        for (let i = 0; i < data.length; i++) cb.append($("<option></option>").val(data[i].kabupaten_kota_id).text(data[i].nama_kab));
      },
    });
  });
  $("#data-member").DataTable({
    language: {
      zeroRecords: "Tidak ada data yang ditampilkan",
    },
  });
  $("#data-member").on("click", ".hapus", function () {
    let url = $(this).attr("id");
    Swal.fire({
      title: "Apakah anda yakin menghapus data user?",
      icon: "warning",
      allowOutsideClick: false,
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus!",
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = url;
      }
    });
  });

  $(".view-edit").on("click", function () {
    let id = $(this).data("id");
    $.ajax({
      url: baseurl + "dashboard/getUbahBatik",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        // let prov = $("#edit-provinsi");
        // let cb = $("#edit-kota");
        $("#edit-batik").val(data.nama_batik);
        $("#edit-provinsi").val(data.provinsi_id);
        $("#edit-deskripsi").val(data.deskripsi);
        $("#edit-excerpt").val(data.excerpt);
        let prov_id = $("#edit-provinsi option:selected").val();
        $.ajax({
          url: baseurl + "dashboard/getKab",
          data: { id: prov_id },
          method: "post",
          dataType: "json",
          success: function (resp) {
            let cb = $("#edit-kota");
            cb.empty();
            cb.append($("<option selected></option>").val(data.kabupaten_kota_id).text(data.nama_kab));
            for (let i = 0; i < resp.length; i++) cb.append($("<option></option>").val(resp[i].kabupaten_kota_id).text(resp[i].nama_kab));
          },
        });
      },
    });

    $("#modal-edit").modal("show");
  });

  $(".btnTambahTolak").on("click", function () {
    let url = $(this).data("id");
    Swal.fire({
      title: "Apakah anda ingin menolak pengajuan konten tersebut?",
      icon: "warning",
      allowOutsideClick: false,
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      cancelButtonText: "Kembali",
      confirmButtonText: "Tolak",
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = url;
      }
    });
  });
  $(".btnTambahSetuju").on("click", function () {
    let url = $(this).data("id");
    console.log(url);
    Swal.fire({
      title: "Apakah anda menyetujui pengajuan konten tersebut?",
      icon: "warning",
      allowOutsideClick: false,
      showCancelButton: true,
      confirmButtonColor: "#5cb85c",
      cancelButtonColor: "#3085d6",
      cancelButtonText: "Kembali",
      confirmButtonText: "Setuju",
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = url;
      }
    });
  });
});
