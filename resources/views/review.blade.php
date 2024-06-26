@extends('layout')

@section('title')Отзывы@endsection

@section('main_content')
    <h1 class="text-white">Форма добавления отзыва</h1>

    @if($errors -> any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors -> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/review/check" method="post">
        @csrf
        <input type="email" name="email" id="email" class="form-control" placeholder="Введите email"><br>
        <input type="text" name="subject" id="subject" class="form-control" placeholder="Введите отзыв"><br>
        <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form><br>

    <h1>Все отзывы</h1>
    <?php
        require 'db.php';
        $reviews = $connection -> query("SELECT * FROM `reviews`");

        while ($review = $reviews -> fetch_assoc()) {
            ?>

            <div class="alert alert-warning">
                <h3><?= $review['subject'] ?></h3>
                <b><?= $review['email'] ?></b>
                <p><?= $review['message'] ?></p>
            </div>

            <?php
        }
    ?>
@endsection