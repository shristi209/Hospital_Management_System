// // notifications.js

// $(document).ready(function() {
//     // Check if the 'message' session variable is set
//     if ("{{ Session::has('message') }}") {
//         toastr.options = {
//             "closeButton": true,
//             "progressBar": true
//         };
//         toastr.success("{{ session('message') }}");
//     }

//     // Check if the 'error' session variable is set
//     if ("{{ Session::has('error') }}") {
//         toastr.options = {
//             "closeButton": true,
//             "progressBar": true
//         };
//         toastr.error("{{ session('error') }}");
//     }

//     // Check if the 'info' session variable is set
//     if ("{{ Session::has('info') }}") {
//         toastr.options = {
//             "closeButton": true,
//             "progressBar": true
//         };
//         toastr.info("{{ session('info') }}");
//     }

//     // Check if the 'warning' session variable is set
//     if ("{{ Session::has('warning') }}") {
//         toastr.options = {
//             "closeButton": true,
//             "progressBar": true
//         };
//         toastr.warning("{{ session('warning') }}");
//     }
// });
