<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header font-weight-bold">Commits of <?php echo getGlobals('branch') ?>
                <a href="/branches/<?php echo getGlobals('repository') ?>" class="float-right btn btn-danger">Back</a>
                <a href="/clone/<?php echo getGlobals('repository') . '/' . getGlobals('branch') ?>" class="float-right  btn btn-primary mr-1"> Clone </a>
                <a href="/cloneToDisk/<?php echo getGlobals('repository') . '/' . getGlobals('branch') ?>" class="float-right  btn btn-primary mr-1"> Clone To Disk </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach (getGlobals('commits') as $commit): ?>
                        <div class="col col-4 mb-2">
                            <a href="/commit/<?php echo getGlobals('repository') . '/' .
                                getGlobals('branch') . '/' . $commit['sha'] ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <?= $commit['commit']['message'] ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>