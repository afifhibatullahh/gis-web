// // $(document).ready(function () {
// //   $("#example").DataTable({
// //     columnDefs: [{ orderable: false, targets: 0 }],
// //     order: [[1, "asc"]],
// //   });
// // });

$(document).ready(function () {
  var table = $("#example").DataTable({
    // processing: true,
    // serverSide: true,
    ajax: linkDatatable,
    columnDefs: [
      {
        targets: 0,
        checkboxes: {
          selectRow: true,
        },
      },
    ],
    select: {
      style: "multi",
    },
    order: [],
    // order: [[1, "asc"]],
  });
});

//   //   $(":button").click(function () {
//   //     var rows_selected = table.column(0).checkboxes.selected();

//   //     // $.each(rows_selected, function (val) {
//   //     //   // Create a hidden element
//   //     //   console.log(val);
//   //     // });

//   //     console.log(rows_selected);
//   //   });
// });
