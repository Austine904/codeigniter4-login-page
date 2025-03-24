<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Hello, <?= session()->get('firstname') ?></h1>
        </div>
    </div>
    <div class="container mt-5">
    <form class="p-4 border rounded shadow">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</div>