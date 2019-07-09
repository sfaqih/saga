
        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="admin/js/jquery.min.js"></script>
        <script src="admin/js/bootstrap.min.js"></script>
        <script src="admin/js/detect.js"></script>
        <script src="admin/js/fastclick.js"></script>
        <script src="admin/js/jquery.blockUI.js"></script>
        <script src="admin/js/waves.js"></script>
        <script src="admin/js/jquery.nicescroll.js"></script>
        <script src="admin/js/jquery.slimscroll.js"></script>
        <script src="admin/js/jquery.scrollTo.min.js"></script>

        <!-- Datatables-->
        <script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="admin/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="admin/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="admin/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="admin/plugins/datatables/jszip.min.js"></script>
        <script src="admin/plugins/datatables/pdfmake.min.js"></script>
        <script src="admin/plugins/datatables/vfs_fonts.js"></script>
        <script src="admin/plugins/datatables/buttons.html5.min.js"></script>
        <script src="admin/plugins/datatables/buttons.print.min.js"></script>
        <script src="admin/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="admin/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="admin/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="admin/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="admin/plugins/datatables/dataTables.scroller.min.js"></script>

        <!-- Toastr js -->
        <script src="admin/plugins/toastr/toastr.min.js"></script>
        

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="admin/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="admin/plugins/jquery-knob/jquery.knob.js"></script>

        <!--Morris Chart-->
		<script src="admin/plugins/morris/morris.min.js"></script>
		<script src="admin/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="admin/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="admin/js/jquery.core.js"></script>
        <script src="admin/js/jquery.app.js"></script>
        
        <script>
            $('.datatable').dataTable();

            @if(Session::has('message'))
                var type = "{{ Session::get('status') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif  

            @if(Session::has('errors'))
                $('.modal').modal({show: true});
            @endif                      
        </script>
    </body>
</html>