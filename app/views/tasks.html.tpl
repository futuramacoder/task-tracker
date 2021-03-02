<?php include_once 'header.html.tpl' ?>
<?php $pagination = $data['pagination'] ?>
<?php $data = $pagination->getData() ?>
<?php $page = $pagination->getCurrentPage() ?>
<?php $totalPages = $pagination->getTotalPages() ?>
<?php session_start() ?>
<main class="container">
    <div class="starter-template py-5 px-3">
    <form method="get" action="/">
        <div class="container">
            <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="checked">
                    <option selected>Sort by verified</option>
                    <option value="true">Verified</option>
                    <option value="false">No verified</option>
                </select>
            </div>
            <div style="padding-top: 10px"></div>
            <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="name">
                    <option selected>Sort by name</option>
                    <option value="false">A-Z sort</option>
                    <option value="true">Z-A sort</option>
                </select>
            </div>
            <div style="padding-top: 10px"></div>
            <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="email">
                    <option selected>Sort by email</option>
                    <option value="false">A-Z sort</option>
                    <option value="true">Z-A sort</option>
                </select>
            </div>
            <div style="padding-top: 10px"></div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
    <div class="starter-template text-center py-5 px-3">
        <?php if(is_array($data)): ?>
            <div class="row">
                <?php foreach($data as $d): ?>
                  <div class="col-sm-6">
                      <div class="card" style="width: 18rem;">
                          <div class="card-body">
                              <h4 class="card-title"><?= $d->getName() ?></h4>
                              <h5 class="card-title"><?= $d->getEmail() ?></h5>


                              <?php if($d->isChecked()): ?>
                              <h6 class="card-subtitle mb-2 text-muted">Verified</h6>
                              <?php else: ?>
                              <h6 class="card-subtitle mb-2 text-muted">No verified</h6>
                              <?php endif; ?>
                              <p class="card-text"><?= $d->getText() ?></p>
                              <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                              <a href="/task/edit?id=<?= $d->getId() ?>" class="btn btn-primary">Edit</a>
                              <?php endif; ?>
                          </div>
                      </div>
                  </div>
                <?php endforeach ?>
            </div>
        <?php endif; ?>
    </div>
    <nav aria-label="Page navigation example">

        <nav aria-label="Page navigation example">
            <ul class="pagination">

                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item"><a class="page-link" href="<?php echo "?page=$i" ?>"><?= $i ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </nav>
</main>
<?php include_once 'footer.html.tpl' ?>

