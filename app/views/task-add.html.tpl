<?php include_once 'header.html.tpl' ?>
<div class="container">
    <form method="post" action="/task/add">
        <div class="mb-3">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="inputTaskText" class="form-label">Task text</label>
            <input type="text" name="text" class="form-control" id="inputTaskText" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include_once 'footer.html.tpl' ?>