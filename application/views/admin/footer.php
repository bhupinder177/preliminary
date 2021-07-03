
<div class="footer">
    <p class="mb-0">Copyright &copy; 2021 Global All Rights Reserved.</p>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.toast.js"></script>
<script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

<!--wow-js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<!--wow-js-end-->
<script>
    $(document).ready(function() {
        $('.app-sidebar__toggle').on('click', function() {
            $('.main_wrapper').toggleClass('active')
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.days>li').on('click', function() {
            $('.days>li.current').removeClass('current');
            $(this).addClass('current');
        });
        // =======
        // $('#companymulti').multiselect({
        // 	 maxHeight: 200
        // });
        $('.select_multiple').select2({
      placeholder: "Select options",
    });
        // =======
    });


</script>

</body>

</html>
