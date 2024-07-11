
$(document).ready(function() {
    $('#example').DataTable( {
    "language": {
    "decimal":        "",
    "emptyTable":     "<html><p >ບໍ່ຂໍ້ມູນໃນຕາຕະລາງ</p></html>",
    "info":           "<html><p >ສະແດງແຖວທີ່ _START_ ຫາ _END_ ຈາກທັງໝົດ _TOTAL_ ແຖວ</p></html>",
    "infoEmpty":      "<html><p >ສະແດງແຖວທີ່ 0 ຫາ 0 ຈາກທັງໝົດ 0 ແຖວ</p></html>",
    "infoFiltered":   "<html><p >(ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຕ້ອງການຫາ)</p></html>",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "<html><p>ສະແດງ _MENU_ ແຖວ</p></html>",
    "loadingRecords": "ກຳລັງດາວໂຫລດ...",
    "processing":     "",
    "search":         "ຄົ້ນຫາ:",
    "zeroRecords":    "<html><p>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຕ້ອງການຫາ</p></html>",
    "paginate": {
    "first":      "ຫນ້າທຳອິດ",
    "last":       "ໜ້າສຸດທ້າຍ",
    "next":       "ທັດໄປ",
    "previous":   "ກັບຄື້ນ"
    },
    "aria": {
    "sortAscending":  ": activate to sort column ascending",
    "sortDescending": ": activate to sort column descending"
    }
    }
    } );

} );
