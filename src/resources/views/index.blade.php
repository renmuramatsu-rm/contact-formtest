@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="{{ route('confirm') }}" method="post">
        @csrf
        <div class="form__page">
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前<span class="need">※</span></span>
                </div>
                <div class="form__group-content-name">
                    <div class="form__group-content_name">
                        <div class="form__input--text">
                            <input type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name') }}" />
                        </div>
                        <div class="form__error">
                            @error('first_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form__group-content_name">
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
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別<span class="need">※</span></span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <ul class="form__list">
                            <li class="form__list-inner">
                                <input class="form__list__text" type="radio" name="gender" value="男性" {{ old('gender', request('gender', '男性')) === '男性' ? 'checked' : '' }}>
                                <label for="gender-male">男性</label>
                            </li>
                            <li class="form__list-inner">
                                <input class="form__list__text" type="radio" name="gender" value="女性" {{ old('gender',request('gender', '男性')) === '女性' ? "checked" : "" }}>
                                <label for="gender-female">女性</label>
                            </li>
                            <li class="form__list-inner">
                                <input class="form__list__text" type="radio" name="gender" value="その他" {{ old("gender", request('gender', '男性')) === 'その他' ? "checked" : "" }}>
                                <label for="gender-other">その他</label>
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
                    <div class="phone-group">
                        <div class="form__input--text">
                            <input type="text" name="tel1" value="{{ old('tel1') }}" placeholder="080">
                        </div>
                        <span class="phone-separator">-</span>
                        <div class="form__input--text">
                            <input type="text" name="tel2" value="{{ old('tel2') }}" placeholder="1234">
                        </div>
                        <span class="phone-separator">-</span>
                        <div class="form__input--text">
                            <input type="text" name="tel3" value="{{ old('tel3') }}" placeholder="5678">
                        </div>
                    </div>
                    <div class="form__error">
                        @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                        <p class="text-danger">電話番号が正しくありません。</p>
                        @endif
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
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->content}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ内容<span class="need">※</span></span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <textarea name="detail" rows="5">{{ old('detail') }}</textarea>
                    </div>
                    <div class="form__error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection