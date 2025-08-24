@extends('layouts.app2')
<style>
    svg.w-5.h-5 {
        /*paginateメソッドの矢印の大きさ調整のために追加*/
        width: 30px;
        height: 30px;
    }
</style>


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
            {{-- モーダルウィンドウ用データ --}}
            @foreach ($contacts as $contact)
            <tr class="todo-table__row">
                <td class="todo-table__item"
                    data-id="{{ $contact->id }}"
                    data-last-name="{{ $contact->last_name }}"
                    data-first-name="{{ $contact->first_name }}"
                    data-gender="{{ $contact->gender }}"
                    data-email="{{ $contact->email }}"
                    data-tel="{{ $contact->tel }}"
                    data-address="{{ $contact->address }}"
                    data-building="{{ $contact->building }}"
                    data-category="{{ $contact->category->content }}"
                    data-detail="{{ $contact->detail }}">
                    {{ $contact->last_name }} {{ $contact->first_name }}
                </td>
                <td class="todo-table__item">
                    {{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}
                </td>
                <td class="todo-table__item">{{ $contact->email }}</td>
                <td class="todo-table__item">{{ $contact->category->content }}</td>
                <td>
                    <button class="update-form__button-submit" type="button">詳細</button>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $contacts->links() }}
    </div>
</div>
<script src="{{ asset('/js/admin.js') }}"></script>
{{-- モーダルウィンドウ --}}
<div class="modal" id="modal" style="display:none;">
    <div class="modal-content">
        <table>
            <tr>
                <th>お名前</th>
                <td><span id="modal-last-name"></span> <span id="modal-first-name"></span></td>
            </tr>
            <tr>
                <th>性別</th>
                <td><span id="modal-gender"></span></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><span id="modal-email"></span></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><span id="modal-tel"></span></td>
            </tr>
            <tr>
                <th>住所</th>
                <td><span id="modal-address"></span></td>
            </tr>
            <tr>
                <th>建物名</th>
                <td><span id="modal-building"></span></td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td><span id="modal-category"></span></td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td><span id="modal-detail"></span></td>
            </tr>
        </table>
        <button id="close-modal">閉じる</button>
        <form id="delete-form" action="" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" id="delete-button" class="red" value="削除"></input>
        </form>
    </div>
</div>

@endsection