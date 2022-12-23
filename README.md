# Реализация шаблона CRUD
## Текст задания
### Цель работы
Разработать и реализовать клиент-серверную информационную систему, реализующую механизм CRUD
## Ход работы
- Пользовательский интерфейс
- Пользовательские сценарии работы
- API сервера и хореографию
- Структура базы данных
- Алгоритмы
1) [Пользовательский интерфейс](https://www.figma.com/file/JSFYDGi8EzhkEXg7aORyxq/Untitled?node-id=0%3A1&t=Rc9e4JLX1sgEuYoj-1)

2) Пользовательские сценарии работы

Пользователь попадает на страницу index.php. Вводит любое текстовое сообщение, в случае корректного ввода данных, его сообщение появится на общей стене в обратном хронологическом порядке, вверху новые, ниже старые публикации. Пользователи могут ставить лайки на понравившиеся записи или убирать их.


3. API сервера и хореография\
![lr_1](хореография.png)

4. Структура БД

posts
| id | text | likes | dtime |
| ------ | ------ | ------ | ------ |

- id : INT(150), PRIMARY KEY, AUTO_INCREMENT
(уникальный идентификатор поста)
- text : VARCHAR(2000)
(текст поста)
- likes: INT(200)
(лайки поста)
dtime: date
(время публикации поста)

likes
| id | userid | postid |
| ------ | ------ | ------ |
- id : INT(150), PRIMARY KEY, AUTO_INCREMENT
(уникальный идентификатор лайка)
- userid : INT(150)
(id пользователя)
- postid: INT(150)
(id поста)

5. Алгоритмы

6. HTTP запросы/ответы
