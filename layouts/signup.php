<div class="container mt-4" id="signupContainer">
    <div class="row">
        <div class="col">
            <!-- Форма регистрации -->
            <h2>Регистрация</h2>
            <form action="config.php" method="post">
                <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required minlength="4" maxlength="12"><br>
                <input type="email" class="form-control" name="email" id="email" placeholder="Введите Email" ><br>
                <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" required minlength="4" maxlength="12"><br>
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Введите фамилию" required minlength="1" maxlength="12"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль" required minlength="4" maxlength="10"><br>
                <button class="btn btn-success" name="signupButton" type="submit">Зарегистрировать</button>
            </form>
            <br>
            <p>Если вы уже зарегистрированы, тогда нажмите <a href="../index.php">здесь</a>.</p>
        </div>
    </div>
</div>