<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Note</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('backend2/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend2/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('backend2/css/bootstrap.min.css') }}" rel="stylesheet">
     {{-- calander stylshit --}}
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    
    <!-- Template Stylesheet -->
    <link href="{{ asset('backend2/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="text-sm">
        <!-- Spinner Start -->
        <div class="wrapper">
            <div id="spinner"
                class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->


            <!-- Sidebar Start -->
            @include('backend.layouts.sidebar')


            <!-- Sidebar End -->


            <!-- Content Start -->

            <div class="content">
                <!-- Navbar Start -->
                @include('backend.layouts.navbar')
                <!-- Navbar End -->


                <!-- Content Wrapper. Contains page content -->

                @yield('content')



                <!-- Footer Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary rounded-top p-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center text-sm-start">
                                &copy; <a href="#">Note</a>,tous les droits sont resérvées 
                            </div>
                            <div class="col-12 col-sm-6 text-center text-sm-end">
                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                 <a href="https://www.ensaj.ucd.ac.ma/">Ensa El jadida</a>
                                                            
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Footer End -->
            </div>


        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>



        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('backend2/lib/chart/chart.min.js') }}"></script>
        <script src="{{ asset('backend2/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('backend2/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('backend2/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('backend2/lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ asset('backend2/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('backend2/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

        <!-- Template Javascript -->
        <script src="{{ asset('backend2/js/main.js') }}"></script>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
        <script>
            @if (Session::has('messege'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('messege') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('messege') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('messege') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('messege') }}")
                        break
                }
            @endif
        </script>


        <script>
            $(document).on("click", "#delete", function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                swal({
                        title: "Ëtes-vous sur de la modification?",
                        text: "Once, this will be permanently deleted!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = link;
                        } else {
                            swal("Safe delete");

                        }
                    });
            });
        </script>
        <script>
            $(document).ready(function() {
             // initialise le calendrier
             $('#calendar').fullCalendar({
                 header: {
                     left: 'prev,next today',
                     center: 'title',
                     right: 'month,agendaWeek,agendaDay'
                 },
                 editable: true,
                 selectable: true,
                 selectHelper: true,
                 events: getStoredEvents(), // récupérer les événements stockés dans le localStorage
                 // Fonction appelée lorsqu'un événement est sélectionné
                 select: function(start, end) {
                     var title = prompt('Nom de l\'événement:');
                     var eventData;
                     if (title) {
                         eventData = {
                             title: title,
                             start: start,
                             end: end
                         };
                         $('#calendar').fullCalendar('renderEvent', eventData, true); // ajouter l'événement au calendrier
                         $('#event-list').append('<li>' + title + ' - ' + start.format('MMMM Do YYYY, h:mm:ss a') + '</li>'); // ajouter l'événement à la liste
                         storeEvent(eventData); // stocker l'événement dans le localStorage
                     }
                     $('#calendar').fullCalendar('unselect');
                 }
             });
             // Ajouter un listener pour supprimer un événement
         $('.fc-event').on('click', '.fc-close', function() {
             var title = $(this).siblings('.fc-title').text();
             deleteEvent(title);
             $(this).closest('.fc-event').remove();
         });
         // Ajouter un listener pour mettre à jour un événement
         $('#calendar').on('click', '.fc-event', function() {
             var title = $(this).find('.fc-title').text();
             var newTitle = prompt('Nouveau nom de l\'événement:');
             var newStart = $(this).data('start');
             var newEnd = $(this).data('end');
             if (newTitle) {
                 updateEvent(title, newTitle, newStart, newEnd);
                 $(this).find('.fc-title').text(newTitle);
             }
         });
         
         
             // Fonction pour stocker un événement dans le localStorage
             function storeEvent(event) {
                 var storedEvents = JSON.parse(localStorage.getItem('storedEvents')) || [];
                 storedEvents.push(event);
                 localStorage.setItem('storedEvents', JSON.stringify(storedEvents));
             }
         
             // Fonction pour récupérer les événements stockés dans le localStorage
             function getStoredEvents() {
                 return JSON.parse(localStorage.getItem('storedEvents')) || [];
             }
         
             // Récupérer les événements stockés lors du chargement de la page
             var storedEvents = getStoredEvents();
             for (var i = 0; i < storedEvents.length; i++) {
                 $('#calendar').fullCalendar('renderEvent', storedEvents[i], true);
                 $('#event-list').append('<li>' + storedEvents[i].title + ' - ' + moment(storedEvents[i].start).format('MMMM Do YYYY, h:mm:ss a') + '</li>');
             }
             // Fonction pour supprimer un événement du localStorage
         function deleteEvent(title) {
             var storedEvents = getStoredEvents();
             for (var i = 0; i < storedEvents.length; i++) {
                 if (storedEvents[i].title === title) {
                     storedEvents.splice(i, 1);
                     break;
                 }
             }
             localStorage.setItem('storedEvents', JSON.stringify(storedEvents));
         }
         
         // Fonction pour mettre à jour un événement du localStorage
         function updateEvent(oldTitle, newTitle, newStart, newEnd) {
             var storedEvents = getStoredEvents();
             for (var i = 0; i < storedEvents.length; i++) {
                 if (storedEvents[i].title === oldTitle) {
                     storedEvents[i].title = newTitle;
                     storedEvents[i].start = newStart;
                     storedEvents[i].end = newEnd;
                     break;
                 }
             }
             localStorage.setItem('storedEvents', JSON.stringify(storedEvents));
         }
         
         });
         
         
             </script>   
    
    
</body>

</html>
