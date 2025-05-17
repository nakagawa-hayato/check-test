<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConfirmationTest</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
                <a class="header__logo" href="/">
                    FashionablyLate
                </a>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Contact</h2>
            </div>
            <form class="form" action="/confirm/contacts" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--name">
                            <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
                            @error('last_name')
                            <div class="form__error">{{ $message }}</div>
                            @enderror
                            <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
                            @error('first_name')
                            <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--radio">
                            <input type="radio" id="male" name="gender" value="男性" />
                            <label for="male">男性</label>
                            <input type="radio" id="female" name="gender" value="女性" />
                            <label for="female">女性</label>
                            <input type="radio" id="other" name="gender" value="その他" />
                            <label for="other">その他</label>
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
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" placeholder="例: test@example.com"  value="{{ old('email') }}"/>
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
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※
                        </span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--tel">
                            <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}"/>
                            @error('tel1')
                            <div class="form__error">{{ $message }}</div>
                            @enderror
                            <p>-</p>
                            <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}"/>
                            @error('tel2')
                            <div class="form__error">{{ $message }}</div>
                            @enderror
                            <p>-</p>
                            <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}"/>
                            @error('tel3')
                            <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
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
                            <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}"/>
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <select class="form__item-select" name="category_id" required>
                            <option>選択してください</option>
                            @foreach ($categories ?? [] as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->content }}
                            </option>
                            @endforeach
                        </select>
                        <div class="form__error">
                            @error('category_id')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" required>{{ old('detail') }}</textarea>
                        </div>
                        <div class="form__error">
                        
                        </div>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>