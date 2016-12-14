<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h1 class="page-header">Требуется вход в систему</h1>


            <form method="post" action="/toEnter">
                <div class="form-group">
                    <label for="Login">Логин</label>
                    <input name="Login" type="text" class="form-control" id="Login" placeholder="Login">
                </div>
                <div class="form-group">
                    <label for="Password">Пароль</label>
                    <input name="Password" type="password" class="form-control" id="Password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="Type">Должность</label>
                    <select name="Type" id="Type" class="form-control">
                        <option value="0">Обязательно выбрать!</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-lg">Вход</button>
            </form>

        </div>
    </div>

</div>