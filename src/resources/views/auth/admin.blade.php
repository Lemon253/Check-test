@extends('layouts.app2')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/admin.css') }}">
@endsection

@section('content')

<!-- <?php print_r($contacts) ?> -->

<div class="todo__content">
    <div class="admin__header">
        <div class="admin-header__ttl">
            <h2>admin</h2>
        </div>
    </div>
    <form class="search-form">
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" />
            <select class="search-form__item-select">
                <option value="">カテゴリ</option>
            </select>
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
    </form>
    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">
                    <span class="todo-table__header-span">お名前</span>
                    <span class="todo-table__header-span">性別</span>
                    <span class="todo-table__header-span">メールアドレス</span>
                    <span class="todo-table__header-span">お問い合わせの種類</span>

                </th>
            </tr>
            @foreach ($contacts as $contact)
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form class="update-form">
                        <div class="update-form__item">
                            <p class="update-form__item-input">{{ $contact['last_name'] }}</p>
                            <p class="update-form__item-input">{{ $contact['first_name'] }}</p>
                            <p class="update-form__item-input">{{ $contact['gender'] }}</p>
                            <p class="update-form__item-input">{{ $contact['email'] }}</p>
                            <p class="update-form__item-input">{{ $contact['content'] }}</p>


                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">
                                更新
                            </button>
                        </div>
                    </form>
                </td>
                <td class="todo-table__item">
                    <form class="delete-form" action="/todos/delete" method="post">
                        @method('DELETE') @csrf
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit">
                                削除
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection