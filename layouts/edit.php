<div class="container mt-4" id="editContainer">
    <div class="row">
        <div class="col">
            <!-- Форма регистрации -->
            <h2>Редактирование</h2>
            <form action="../config.php" method="post">
                <input type="text" class="form-control" name="name" id="name" value="<?=$loggedUserAllData['name'];?>" required minlength="4" maxlength="12"><br>
                <input type="text" class="form-control" name="surname" id="surname" value="<?=$loggedUserAllData['surname'];?>" required minlength="1" maxlength="12"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" required minlength="4" maxlength="10"><br>
                <button class="btn btn-success" name="editButton" type="submit">Внести изменения</button>
            </form>
            <br>
            <p>Вернуться на <a href="../index.php">главную</a>.</p>
        </div>
    </div>
</div>
