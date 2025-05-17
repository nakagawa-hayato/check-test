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
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">
                    FashionablyLate
                </a>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <li class="header-nav__item">
                            <a class="header-nav__link" href="{{ route('login') }}">login</a>
                        </li>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <h2>Register</h2>
            <form class="form" action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-utilities">
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">お名前</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}"/>
                            </div>
                            <div class="form__error">
                                @error('name')
                                <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">メールアドレス</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}"/>
                            </div>
                            <div class="form__error">
                                @error('email')
                                <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">パスワード</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="password" name="password" placeholder="例: coachtech1106" />
                            </div>
                            <div class="form__error">
                                @error('password')
                                <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">登録</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>