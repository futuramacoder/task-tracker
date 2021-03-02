<?php include_once 'header.html.tpl' ?>
<div class="container">
    <form method="post" action="/task/edit?id=<?= $data->getId() ?>">
        <div class="mb-3">
            <label for="inputTaskName" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="inputTaskName" aria-describedby="emailHelp" value="<?php echo $data->getName() ?>">
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" value="<?php echo $data->getEmail() ?>">
        </div>
        <div class="mb-3">
            <label for="inputTaskText" class="form-label">Task text</label>
            <input type="text" name="text" class="form-control" id="inputTaskText" aria-describedby="emailHelp" value="<?php echo $data->getText() ?>">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="checked" id="flexRadioDefault1" value="true">
            <label class="form-check-label" for="flexRadioDefault1">
                Verify
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="checked" id="flexRadioDefault2" checked value="false">
            <label class="form-check-label" for="flexRadioDefault2">
                Not verified
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include_once 'footer.html.tpl' ?>