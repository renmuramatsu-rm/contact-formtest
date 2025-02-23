@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前<span class="need">※</span></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name') }}" />
                </div>
                <div class="form__error">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例：太郎" value="{{ old('last_name') }}" />
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別<span class="need">※</span></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <ul class="form__list">
                        <li class="form__list-inner">
                            <input class="form__list__text" type="radio" name="gender" value="男性" checked="checked">男性
                        </li>
                        <li class="form__list-inner">
                            <input class="form__list__text" type="radio" name="gender" value="女性">女性
                        </li>
                        <li class="form__list-inner">
                            <input class="form__list__text" type="radio" name="gender" value="その他">その他
                        </li>
                    </ul>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス<span class="need">※</span></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号<span class="need">※</span></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="tel" name="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="{{ old('tel') }}" />
                </div>
                <div class="form__error">
                    @error('tel')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所<span class="need">※</span></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" value="{{ old('building') }}" />
                </div>
                <div class="form__error">
                    @error('building')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類<span class="need">※</span></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <select class="form__select" name="category_id">
                        <option value="" disabled selected>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->content}}</option>
                        @endforeach
                </div>
                <div class="form__error">
                    @error('content')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの内容<span class="need">※</span></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="textarea" name="detail" value="{{ old('detail') }}" />
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection