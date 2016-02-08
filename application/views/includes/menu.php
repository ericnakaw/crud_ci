<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a href="#">Start Bootstrap</a></li>
            <li><?php echo anchor('crud/create', 'Create') ?></li>
            <li><?php echo anchor('crud/retrieve', 'Retrieve') ?></li>
            <li><?php echo anchor('crud/update', 'Update') ?></li>
            <li><?php echo anchor('crud/delete', 'Delete') ?></li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--                    <h1>CRUD</h1>
                                        <ul>
                                            <li><?php echo anchor('crud/create', 'Create') ?></li>
                                            <li><?php echo anchor('crud/retrieve', 'Retrieve') ?></li>
                                            <li><?php echo anchor('crud/update', 'Update') ?></li>
                                            <li><?php echo anchor('crud/delete', 'Delete') ?></li>
                                        </ul>-->
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
