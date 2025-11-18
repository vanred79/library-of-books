/\*
//POST /users — регистрация нового пользователя (логин, пароль, email)

$request_data = array(
"username" => "username2",
"email" => "username2@mail.ru",
'password' => 'secret123'
);

$data =  json_encode($request_data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://library-books.local/users');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
));

curl_exec($ch);
curl_close($ch);
_/
//-------------------------------------------------------
/_

//GET /users/{id} — просмотр профиля (только для авторизованных)

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://library-books.local/users/1');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsaWJyYXJ5LWJvb2tzLmxvY2FsIiwiYXVkIjoibGlicmFyeS1ib29rcy5sb2NhbCIsImp0aSI6IjRmMWcyM2ExMmFhIiwiaWF0IjoxNzYzNDExMDU2LjUzNzU1MiwiZXhwIjoxNzYzNDE0NjU2LjUzNzU1MiwidWlkIjoxfQ.Uuxe1yRCiruZEW1XBj9GGZXN2RtBBJGCYv9xRWM7A6s',
));

curl_exec($ch);
curl_close($ch);

_/
/_

//-------------------------------------------------------

//POST /auth/login — авторизация (получение JWT токена)

$request_data = array(
"username" => "username1",
'password' => 'secret123'
);

$data =  json_encode($request_data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://library-books.local/auth/login');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
));

curl_exec($ch);
curl_close($ch);

_/
/_
//-------------------------------------------------------
//GET /books/{id} — получить информацию о книге

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://library-books.local/books'); //получить все книги
//curl_setopt($ch, CURLOPT_URL, 'https://library-books.local/books?page=1&per-page=5'); //получить книги page 1 
//curl_setopt($ch, CURLOPT_URL, 'https://library-books.local/books?page=2&per-page=5'); //получить книги page 2
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json'  
));

curl_exec($ch);
curl_close($ch);

\*/

/\*
//-------------------------------------------------------

//POST /books — добавить книгу (только авторизованный пользователь)

$request_data = array(
"title" => "title book 11",
"body" => "body book 11"
);

$data =  json_encode($request_data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://library-books.local/books');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsaWJyYXJ5LWJvb2tzLmxvY2FsIiwiYXVkIjoibGlicmFyeS1ib29rcy5sb2NhbCIsImp0aSI6IjRmMWcyM2ExMmFhIiwiaWF0IjoxNzYzNDcwMTkyLjYxMDAxOCwiZXhwIjoxNzYzNDczNzkyLjYxMDAxOCwidWlkIjoxfQ.Onih6B4r2zuQU1LBkQC01UUkHAA8EM8vN12Z7DPVlmo'
));

curl_exec($ch);
curl_close($ch);
_/
/_

//-------------------------------------------------------
//GET /books/{id} — получить информацию о книге

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://library-books.local/books/1');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json'  
));

curl_exec($ch);
curl_close($ch);
\*/

/\*
//-------------------------------------------------------

//PUT /books/{id} — обновить данные книги (только авторизованный)

$request_data = array(
"title" => "Updated title",
"body" => "Updated body"
);

$data =  json_encode($request_data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://library-books.local/books/1');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsaWJyYXJ5LWJvb2tzLmxvY2FsIiwiYXVkIjoibGlicmFyeS1ib29rcy5sb2NhbCIsImp0aSI6IjRmMWcyM2ExMmFhIiwiaWF0IjoxNzYzNDczODM4LjUwMDExLCJleHAiOjE3NjM0Nzc0MzguNTAwMTEsInVpZCI6MX0.1gG4HEkwuoNh-azaeuO9shcdqAGiRDzUrcQAkRAGiyk'
));

curl_exec($ch);
curl_close($ch);

_/
/_
//-------------------------------------------------------

DELETE /books/{id} — удалить книгу (только авторизованный)

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://library-books.local/books/11');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsaWJyYXJ5LWJvb2tzLmxvY2FsIiwiYXVkIjoibGlicmFyeS1ib29rcy5sb2NhbCIsImp0aSI6IjRmMWcyM2ExMmFhIiwiaWF0IjoxNzYzNDczODM4LjUwMDExLCJleHAiOjE3NjM0Nzc0MzguNTAwMTEsInVpZCI6MX0.1gG4HEkwuoNh-azaeuO9shcdqAGiRDzUrcQAkRAGiyk'
));

curl_exec($ch);
curl_close($ch);
\*/
