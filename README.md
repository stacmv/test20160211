# test20160211
Test task

Simple arithmetic calculator. Sends expression to the server via AJAX (JSONP) and displays the result or the error message in calculations log.
Expression parsing implemented by means of PHP eval function after validation by regex.

Used Slim 2 as PHP framework, jQuery, Bootstap 2 for CSS.


##Known Issues
 - Test Suite is incomplete;
 - NOJS fallback is not tested;
 - Documentation is absent;
 - HTML is rendered by PHP instead of static HTML page.
 - ...

---
Простой арифметический калькулятор. Посылает выражениена сервер посредством AJAX (JSONP) и отображает результат или сообщение об ошибке в журнале расчетов.
Разбор выражений реализуется с помощью PHP функции eval после проверки по регулярному выражению. 

Используется микрофреймворк Slim 2, jQuery и Bootsrap 2 для CSS.

##Известные недостатки (малая часть их)
 - Набор тестов не полный (чуть-чуть тестируется один класс);
 - Работа без JS предусмотрена, но не проверялась. Может не работать;
 - Документации нет;
 - HTML рендерится PHP (для обеспечения работы без JS, в основном) вместо использования статической страницы, как сказано в задании.
 - ...
