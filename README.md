Тестовое задание на фреймворке laravel.

======================

ToDo лист
------------

Приложение умеет:    

● создавать задание, и менять его статус

● так же можно работать с сервисом по средствам API


API GET
    
{host}/api/task-all - вывести все записи
    
{host}/api/task-active - вывести все активные записи
    
{host}/api/task-done - вывести все завершенные записи
    
{host}/api/task-delete/{id} - удалить запись по id
    
{host}/api/task-finish/{id} - перевести запись в статус завершенное
    
    API POST
    
{host}/api/task-add - добавить запись

-------


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<p align="center">
Не забудь вставить свой .env файл с информацией о соединении с бд
а так же composer update
</p>
