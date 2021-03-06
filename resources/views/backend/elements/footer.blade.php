<!-- FOOTER -->
    <div id="footer">
        <p>Copyright &copy;  <strong class="ft-bold">Xanh Tuoi</strong> Tropical Fish Co.,Ltd &nbsp;{{date('Y')}} &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->

     <script src="{{ asset('') }}public/backend/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}public/backend/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <script src="{{ asset('') }}public/backend/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ asset('') }}public/backend/plugins/dataTables/dataTables.bootstrap.js"></script>

    <script src="{{ asset('') }}public/backend/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ asset('') }}public/backend/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="{{ asset('') }}public/backend/js/bootstrap-toggle.min.js"></script>
    <script src="{{ asset('') }}public/backend/plugins/jasny/js/bootstrap-fileupload.js"></script>

    <!-- END GLOBAL SCRIPTS -->

    <script>
         $(document).ready(function () {
             $('#dataTables-users').dataTable();
         });
    </script>
    <script>
         $(document).ready(function () {
             $('#dataTables-categories').dataTable();
         });
    </script>
    <script>
         $(document).ready(function () {
             $('#dataTables-facilities').dataTable();
         });
    </script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
    </script>

</body>
    <!-- END BODY-->
    
</html>
