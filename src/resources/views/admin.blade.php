<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}" />
    @livewireStyles
</head>

<style>
    svg.w-5.h-5 {
        /*paginateメソッドの矢印の大きさ調整のために追加*/
        width: 30px;
        height: 30px;
    }
</style>
<header class="header">
    <div class="header__inner">
        <div class="header__logo">
            FashionablyLate
        </div>
    </div>
    <div class="logout__button">
        @if (Auth::check())
        <form class="form" action="/logout" method="post">
            @csrf
            <button class="header-nav__button">ログアウト</button>
        </form>
        @endif
    </div>
</header>

<body>
    <div class="admin__content">
        <div class="search">
            <form class="search-form" action="/admin/search" method="get">
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
                    <select class="search-form__item-select" name="gender">
                        <option value="">性別</option>
                        @foreach ($genders as $gender)
                        <option value="{{ $gender }}">{{ $genderMap[(int)$gender] ?? '不明' }}</option>
                        @endforeach
                    </select>
                    <select class="search-form__item-select" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                    <input class="search-form__item-select" type="date" name="date" value="{{ request('created_at') }}">
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
                <div class="reset-form__button">
                    <button type="button" onclick="location.href='/admin'">リセット</button>
                </div>
            </form>
        </div>

    </div>
    <div class="pagination-container">
        <div class="CSV">
            <form action="{{ route('admin.export') }}" method="GET">
                <button type="submit">エクスポート</button>
            </form>
        </div>
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
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td class="confirm-table__text">
                            {{ $contact->first_name }} {{ $contact->last_name }}
                        </td>
                        <td class="confirm-table__text">{{ $genderMap[$contact->gender] ?? '不明' }}</td>
                        <td class="confirm-table__text">{{ $contact->email }}</td>
                        <td class="confirm-table__text">
                            {{ $contact->category->content ?? 'その他' }}
                        </td>
                        <td class="confirm-table__text-button">
                            <button type="button" wire:click="$emit('showModal', {{ $contact->id }})" wire:loading.attr="disabled">詳細</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>


    </div>
    </div>
    @livewire('modal')
    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>
    @livewireScripts
</body>