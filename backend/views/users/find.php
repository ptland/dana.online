<?php include 'common/header.php'; ?>

<div class="dashboard-wrapper">

    <!-- Top Bar starts -->
    <div class="top-bar">
        <div class="page-title">
            Find Users by Name
        </div>

    </div>
    <!-- Top Bar ends -->

    <!-- Main Container starts -->
    <div class="main-container">

        <!-- Container fluid starts -->
        <div class="container-fluid">
            <!-- Spacer starts -->
            <div class="spacer">
                <?php include 'search_form.php';?>
                
                <?php include 'common/message_panel.php'; ?>

                <!-- Row Starts -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Invoices</h4>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div id="dt_example" class="table-responsive example_alt_pagination clearfix">
                                        <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                                            <thead>
                                            <tr>
                                                <th style="width:3%">
                                                    <input type="checkbox">
                                                </th>
                                                <th style="width:10%">Email</th>
                                                <th style="width:15%">Name</th>
                                                <th style="width:12%">Phone</th>
                                                <th style="width:20%">Address</th>
                                                <th style="width:20%">Role</th>
                                                <th style="width:15%">&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if (!empty($result)):
                                                $ch = 'A';
                                                foreach ($result as $row) :
                                                    ?>
                                                    <tr class="grade<?= $ch ?>">
                                                        <td>
                                                            <input type="checkbox">
                                                        </td>
                                                        <td><?= $row['email'] ?></td>
                                                        <td><?= $row['name'] ?></td>

                                                        <td>
                                                            <?= $row['phone'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['address'] ?>

                                                        <td>
                                                            <?= $row['role_id'] == 1 ? 'Admin' : 'Customer'; ?>
                                                        </td>
                                                        <td>
                                                            <!-- List Control Buttons -->
                                                            <?php include 'common/list_control_buttons.php'; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $ch ++;
                                                    if ($ch > 'Z')
                                                        $ch = 'A';
                                                endforeach;
                                            endif;
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row Ends -->

            </div>
            <!-- Spacer ends -->
        </div>
        <!-- Container fluid ends -->

    </div>
    <!-- Main Container ends -->

    <!-- Right sidebar starts -->
    <div class="right-sidebar">

        <!-- Addons starts -->
        <div class="add-on clearfix">
            <div class="add-on-wrapper">
                <h5>Tasks</h5>
                <div class="todo">
                    <fieldset class="todo-list">
                        <label class="todo-list-item info">
                            <input type="checkbox" class="todo-list-cb">
                            <span class="todo-list-mark"></span>
                            <span class="todo-list-desc">Attend seminar</span>
                        </label>
                        <label class="todo-list-item danger">
                            <input type="checkbox" class="todo-list-cb">
                            <span class="todo-list-mark"></span>
                            <span class="todo-list-desc">UX workshop</span>
                        </label>
                        <label class="todo-list-item success">
                            <input type="checkbox" class="todo-list-cb">
                            <span class="todo-list-mark"></span>
                            <span class="todo-list-desc">Pickup kids @4pm</span>
                        </label>
                        <label class="todo-list-item danger">
                            <input type="checkbox" class="todo-list-cb" checked>
                            <span class="todo-list-mark"></span>
                            <span class="todo-list-desc">Send wishes</span>
                        </label>
                        <label class="todo-list-item success">
                            <input type="checkbox" class="todo-list-cb">
                            <span class="todo-list-mark"></span>
                            <span class="todo-list-desc">Redesign Application</span>
                        </label>
                        <label class="todo-list-item info">
                            <input type="checkbox" class="todo-list-cb">
                            <span class="todo-list-mark"></span>
                            <span class="todo-list-desc">Send an email</span>
                        </label>
                    </fieldset>
                </div>
            </div>
        </div>
        <!-- Addons ends -->

        <!-- Addons starts -->
        <div class="add-on clearfix">
            <div class="add-on-wrapper">
                <h5>Revenue</h5>
                <ul class="revenue-from">
                    <li>
                        <small>New Delhi</small>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%">
                                <span class="sr-only">56% Complete</span>
                            </div>
                        </div>
                        <span class="revenue-perc info">56%</span>
                    </li>
                    <li>
                        <small>Birmingham</small>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100" style="width: 22%">
                                <span class="sr-only">22% Complete</span>
                            </div>
                        </div>
                        <span class="revenue-perc danger">22%</span>
                    </li>
                    <li>
                        <small>California</small>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%">
                                <span class="sr-only">43% Complete</span>
                            </div>
                        </div>
                        <span class="revenue-perc warning">43%</span>
                    </li>
                    <li>
                        <small>Berlin</small>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                <span class="sr-only">32% Complete</span>
                            </div>
                        </div>
                        <span class="revenue-perc success">32%</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Addons ends -->

    </div>
    <!-- Right sidebar ends -->

    <!-- Footer starts -->
    <footer>
        Copyright Everest Admin Panel 2014.
    </footer>
    <!-- Footer ends -->
    <!-- Footer ends -->

</div>

<?php include 'common/footer.php'; ?>