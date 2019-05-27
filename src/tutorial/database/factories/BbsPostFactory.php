<?php

use Faker\Generator as Faker;

$factory->define(App\BbsPost::class, function (Faker $faker) {
    return [
        'title' => '投稿のタイトル',
        'body' => "本文です。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。\nテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。",
    ];
});
