</div>

<!-- Loading Scripts -->
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/jquery.min.js"></script>
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/bootstrap-select.min.js"></script>
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/bootstrap.min.js"></script>
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/Chart.min.js"></script>
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/fileinput.js"></script>
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/chartData.js"></script>
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/summernote.js"></script>
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/libs.js"></script>
<script src="<?php echo ADMIN_PUBLIC_URL ?>js/main.js"></script>
<div class="modal fade modal-alert" id="modal-alert" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
$alert = \admin\Alert::fetch();
if ($alert) {
    ?>
    <script>
        $(document).ready(function () {
            alert('<?php echo $alert; ?>')
        })
    </script>
<?php } ?>
</body>

</html>
