<h2>Отправка сообщения</h2>

<?php echo validation_errors(); ?>

<?php echo form_open("message/index/{$id}"); ?>

<label for="text">Email</label>
<input type="text" name="email" /><br />

<label for="text">Тема</label>
<input type="input" name="theme" /><br />

<label for="text">Текст</label>
<input name="text" name="text"/><br />

<input type="submit" name="submit" value="Отправить" />

</form>