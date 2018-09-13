<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <?php $commit = getGlobals('commit') ?>
            <div class="card-header font-weight-bold">Commits of <?php echo $commit['commit']['message'] ?>
                <a href="<?php echo getHost() ?>/commits/<?php echo getGlobals('repository') . '/' . getGlobals('branch') ?>" class="float-right  btn btn-danger"> Back </a>
                <a href="<?php echo getHost() ?>/pull/<?php echo getGlobals('repository') . '/' .
                    getGlobals('branch') . '/' . $commit['sha'] ?>" class="float-right  btn btn-warning mr-1"> Pull </a>
                <a href="<?php echo getHost() ?>/clone/<?php echo getGlobals('repository') . '/' . $commit['sha'] ?>" class="float-right  btn btn-primary mr-1"> Clone </a>
                <a href="<?php echo getHost() ?>/cloneToDisk/<?php echo getGlobals('repository') . '/' . $commit['sha'] ?>" class="float-right  btn btn-primary mr-1"> Clone To Disk </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6">
                        <div class="row">
                            <label for="email" class="col-sm-3 col-form-label text-md-right">Sha</label>
                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo $commit['sha'] ?>" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <div class="row">
                            <label for="email" class="col-sm-3 col-form-label text-md-right">Message</label>
                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo $commit['commit']['message'] ?>" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($commit['files'] as $file): ?>
                        <div class="col col-4 mb-2">
                            <a href="<?php echo $file['raw_url'] ?>">
                                <?php
                                $class = "";
                                switch ($file['status']) {
                                    case 'modified':
                                        $class = 'bg-primary text-white';
                                        break;
                                    case 'added':
                                        $class = 'bg-warning text-primary';
                                        break;
                                    case 'removed':
                                        $class = 'bg-danger text-white';
                                        break;
                                }
                                ?>
                                <div class="card <?php echo $class ?>">
                                    <div class="card-body">
                                        <?= $file['filename'] ?>
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