<style type="text/css" >
    .mt
    {
        margin-top: 20vh;
    }
</style>

<div class="container-fluid mt " >
<div class="row col-4 offset-4" >
        <div class="card w-100 ">
            <h3 class="card-header text-center text-white bg-success">Se connecter</h3>
            <div class="card-body">
                <?php if($message = \MIS\Infrastructure\Service\Session::get('danger')) : ?>
                    <div class="alert-danger text-center alert" ><?= $message ?></div>
                <?php endif; ?>
                <form method="POST" >
                    <div class="form-group"  >
                        <label for="email">E-mail</label>
                        <input type="email" required class="form-control shadow-sm"  name="User[email]" id="email">
                    </div>
                    <div class="form-group" >
                        <label for="password">Mot de passe</label>
                        <input type="password" required class="form-control shadow-sm"  name="User[password]" id="password" >
                    </div>
                    <button type="submit" class="btn btn-success col-md-12 rounded-pill" >Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>
