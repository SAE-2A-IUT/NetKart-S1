<a class="join_session_shadow" href=""></a>
<form class="join_session_form">
    <a class="session_cross" href="">X</a>
    <div class="form_container">
        <input type="text" name="session_code" placeholder="Code multijoueur" value="<?php echo $_POST['session_code'] ;?>" required class="form-input">
        <input type="text" name="session_pseudo" placeholder="Pseudo" required class="form-input">
        <input type="submit" value="Rejoindre" class="purple-button">
    </div>
</form>

<?php
