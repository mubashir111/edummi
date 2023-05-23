
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                ©
                <script>document.write(new Date().getFullYear())</script> EDUMMI UNIVERSE <span
                    class="d-none d-sm-inline-block"> by GREENWORLD International</span>
            </div>
        </div>
    </div>
</footer>
</div>

</div>

<style type="text/css">
    table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td {
    text-align: center;
}
</style>

  <script type="text/javascript">
                                $(document).ready(function() {
                                  

                                    if (i==1) {
                                $("#course-finder").attr("href", "{{ route('course-finder.index') }}");
                            }else{
                                 $("#course-finder").removeAttr("href");
                            }
                                });
                                </script>

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
<script src="assets/js/ajax.js"></script>
</body>

</html>
