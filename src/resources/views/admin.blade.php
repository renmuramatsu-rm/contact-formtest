@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection
<style>
    svg.w-5.h-5 {
        /*paginateメソッドの矢印の大きさ調整のために追加*/
        width: 30px;
        height: 30px;
    }
</style>

@section('content')
<div class="admin__content">
    <div class="search">
        <form class="search-form" action="/admin/search" method="get">
            @csrf
            <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
    </div>
    <div class="search-form__button">
        <button class="search-form__button-submit" type="submit">検索</button>
    </div>
</div>
<div class="pagination-container">
    <nav aria-label="Page navigation">
        {{ $contacts->links() }}
    </nav>
</div>
<div class="admin-table">
    <table class="admin-table__inner">

        <tr class="admin-table__row">
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td class="confirm-table__text">
                        <input type="text"
                            value="{{ trim($contact['first_name'] . ' ' . $contact['last_name']) }}" readonly />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                    </td>
                    <td class="confirm-table__text">
                        <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly />
                    </td>
                    <td class="confirm-table__text">
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                    <td class="confirm-table__text">
                        <input type="text" name="category_id" value="{{ $contact['category_id'] }}" readonly />
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
</div>
@endsection