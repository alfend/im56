<?php

/* @var $this yii\web\View */

$this->title = 'Авторизация';
?>

    <p>Авторизация</p>

<form id="form1" method="post" action="login.php">
    <table>
        <th>

            Вход в систему

        </th>

        <tr>
            <td>
                <label>Логин:&nbsp&nbsp
                    <input type="text" name="login" accesskey="log"/>
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <label>Пароль:
                    <input type="password" name="password" accesskey="pas" />
                </label>
            </td>
        </tr>
        <tr>
            <td align="center">
                <input type="submit" value="Войти" />
            </td>
        </tr>

    </table>
</form>


