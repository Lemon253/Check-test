@extends('layouts.app2')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/admin.css') }}">
@endsection

@section('content')

<div class="todo__content">
    <div class="admin__header">
        <div class="admin-header__ttl">
            <h2>admin</h2>
        </div>
    </div>
    <form class="search-form" action="/admin/search" method="post">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="search" @if(session('searches.search')) value="{{ session('searches.search') }}" @endif />
            <input class="search-form__item-input" type="date" name="created_at" @if(session('searches.created_at')) value="{{ session('searches.created_at') }}" @endif />
            <select class="search-form__item-select-gender" name="gender">
                <option value="" @if(session('searches.gender')=='' ) selected @endif>性別</option>
                <option value="1" @if(session('searches.gender')=='1' ) selected @endif>男性</option>
                <option value="2" @if(session('searches.gender')=='2' ) selected @endif>女性</option>
                <option value="3" @if(session('searches.gender')=='3' ) selected @endif>その他</option>
            </select>
            <select class="search-form__item-select-category" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if(session('searches.category_id')==$category->id)
                    selected
                    @endif
                    >{{ $category->content }}</option>
                @endforeach
            </select>
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit" name="submit" value="submit">検索</button>
            <button class="search-form__button-reset" type="submit" name="reset" value="reset">リセット</button>
        </div>
    </form>
    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">
                    <span class="todo-table__header-span">お名前</span>
                </th>
                <th class="todo-table__header">
                    <span class="todo-table__header-span">性別</span>
                </th>
                <th class="todo-table__header">
                    <span class="todo-table__header-span">メールアドレス</span>
                </th>
                <th class="todo-table__header">
                    <span class="todo-table__header-span">お問い合わせの種類</span>
                </th>

            </tr>
            @foreach ($contacts as $contact)
            <tr class="todo-table__row">
                <form class="update-form">
                    <div class="update-form__item">
                        <td class="todo-table__item">
                            <span class="update-form__item-input">{{ $contact->last_name }}</span>
                        </td>
                        <td class="todo-table__item">
                            <span class="update-form__item-input">{{ $contact->first_name }}</span>
                        </td>
                        <td class="todo-table__item">
                            <span class="update-form__item-input">{{ $contact->gender }}</span>
                        </td>
                        <td class="todo-table__item">
                            <span class="update-form__item-input">{{ $contact->email }}</span>
                        </td>
                        <td class="todo-table__item">
                            <span class="update-form__item-input">{{ $contact->category->content }}</span>
                        </td>
                    </div>
                    <td>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">
                                詳細
                            </button>
                        </div>
                    </td>
                </form>
            </tr>
            @endforeach
        </table>
        {{ $contacts->links() }} 
    </div>
</div>
@endsection