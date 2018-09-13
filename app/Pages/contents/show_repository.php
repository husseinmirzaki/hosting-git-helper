<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header font-weight-bold"><?php echo getGlobals('repository')['name'] ?>
                <a href="<?php echo getHost() ?>/branches/<?php echo getGlobals('repository')['name'] ?>" class="float-right btn btn-danger">Back</a>
            </div>
            <div class="card-body">
                <pre>
                    <?php print_r(getGlobals('repository')) ?>
                </pre>
            </div>
        </div>

    </div>
</div>