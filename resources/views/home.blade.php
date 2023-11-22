<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <p>Здравствуйте, {{auth()->user()->name}}, вы вошли.</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Выйти</button>
    </form>

    <div style="border: 3px solid black;">
        <h2>Создать новую запись</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Название">
            <textarea name="body" placeholder="Текст записи"></textarea>
            <button>Сохранить запись</button>
        </form>
    </div>
    
    <div style="border: 3px solid black;">
        <h2>Все записи</h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding: 10px; margin: 10px">
            <h3>{{$post['title']}}  автор: {{$post->user->name}}</h3>
            {{$post['body']}}
            <p><a href="/edit-post/{{$post->id}}">Редактировать</a></p>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Удалить</button>
            </form>
        </div>
        @endforeach
    </div>

    @else
    <div style="border: 3px solid black;">
        <h2>Регистрация</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="имя">
            <input name="email" type="text" placeholder="электронная почта">
            <input name="password" type="password" placeholder="пароль">
            <button>Зарегистрироваться</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>Вход</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="имя">
            <input name="loginpassword" type="password" placeholder="пароль">
            <button>Войти</button>
        </form>
    </div>
    @endauth
</body>
</html>