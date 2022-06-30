<form method="post" action="" id="formChangePassword">

    <div class="mb-3">
        <label form-label>Ancien mot de passe</label>
        <input class="form-control" required type="password" name="pass_old">
    </div>

    <div class="mb-3">
        <label class="form-label">Nouveau mot de passe</label>
        <input class="form-control" required type="password" name="new_pass">
    </div>

    <div class="mb-3">
        <label class="form-label">Confirmation du mot de passe</label>
        <input class="form-control" required type="password" name="new_pass_conf">
    </div>

    <input type="submit" class="btn btn-primary" value="Modifier" name="submit">

</form>