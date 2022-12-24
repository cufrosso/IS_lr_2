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

Пользователь попадает на страницу *index.php*. Вводит свой логин и текст поста. В случае корректного ввода данных, его сообщение появится на общей стене в обратном хронологическом порядке, вверху новые, внизу старые публикации. Пользователи могут ставить лайки на понравившиеся записи или убирать их. Также есть возможность изменить содержание записи, с помощью кнопки *change*, при нажании на которую пользователь переходит на страницу *update.php*, где вносит изменения в текст поста. Есть возможность удалять записи, с помощью кнопки *delete*.

3. API сервера и хореография\
![lr_1](хореография.png)

4. Структура БД

*post*
| Название | Тип | Длина | NULL | Описание |
| :------: | :------: | :------: | :------: | :------: |
| **id** | INT | - | - | id поста |
| **login** | VARCHAR | 100 | - | Логин пользователя |
| **text** | TEXT | - | - | Текст поста |
| **date** | VARCHAR | 255 | - | Дата создания поста |
| **like** | INT | 11 | 0 | Количество лайков |

*likes*
| Название | Тип | Длина | NULL | Описание |
| :------: | :------: | :------: | :------: | :------: |
| **id** | INT | - | - | id лайка |
| **postid** | INT | - | - | id поста |

5. Алгоритмы

6. HTTP запросы/ответы

7. Значимые фрагменты кода

**Пагинация**

**Уменьшение счётчика лайка(или дизлайк)**
```php
if (isset($_POST['unliked'])) {
		$post_id = $_POST['postid'];
		$result = mysqli_query($connect, "SELECT * FROM post WHERE id = $post_id");
		$row = mysqli_fetch_array($result);
		$like = $row['likes'];
        if ($like < 0){
            $like = 0;
        }

		mysqli_query($connect, "DELETE FROM likes WHERE postid = $post_id");
		mysqli_query($connect, "UPDATE post SET likes = $like - 1 WHERE id = $post_id");

		echo $like - 1;
		exit();
	}
```

```php
$post = mysqli_query($connect, "SELECT * FROM post ORDER BY id DESC");
    $posts = mysqli_fetch_all($post);

    $total = count($posts); // кол-во постов
    $per_page = 7; // кол-во постов на одну стр
    $count_page = ceil( $total / $per_page ); // кол-во страниц
    $page = $_GET['page']??1; // определение страницы по GET
    $page = (int)$page;

    if(!$page || $page < 1){
        $page = 1;
    } else if ($page > $count_page) {
        $page = $count_page;
    }
    $start = ($page - 1) * $per_page;
```

