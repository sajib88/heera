
<?php /// echo 'test commit';?>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>heera.org Application</b>  System | Version 1.0
        </div>
        <strong><a href="<?php echo base_url(); ?>"><b>Copyright © 2017 heera.org </b></a> - </strong> Patent Pending. All Rights Reserved
    </footer>


    <script>
        $('.addProject').click(function() {
             window.location.href='<?php echo base_url('project/add');?>';
        });

        $('.addFund').click(function() {
             window.location.href='<?php echo base_url('fund/Fund/addfund');?>';
        });

    </script>

  </body>
</html>
