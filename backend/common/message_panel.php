<?php if (isset($msg)): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sx-12 col-sm-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="demo-btn-group">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?= $msg ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>