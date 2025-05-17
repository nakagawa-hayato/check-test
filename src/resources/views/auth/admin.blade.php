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
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
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
                        @if (Auth::check())
                        <li class="header-nav__item">
                            <form class="form" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="header-nav__link">logout</button>
                            </form>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="admin__content">
            <div class="admin__title">
                <h2>Admin</h2>
            </div>
            <form class="search-form" action="{{ route('auth.admin') }}" method="GET">
                <div class="search-form__item">
                    <input class="search-form__item-input" type="text" name="content" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">
                <select class="search-form__item-select" name="gender">
                    <option value="">性別</option>
                    <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
                    <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
                    <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
                </select>
                <select class="search-form__item-select" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories ?? [] as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
                <div class="search-form__item-select">
                    <input type="date" name="date" value="{{ request('date') }}">
                </div>
                <button class="search-form__button-submit-search" type="submit">検索</button>
                <button class="search-form__button-submit-reset" type="submit">リセット</button>
                </div>
            </form>
            <div class="admin-page__content">
                <div class="admin-page__item">
                    <button class="admin-page__export-button">エクスポート</button>
                    <div class="admin-page__pagination">
                        <button disabled>&lt;</button>
                        <button class="current">1</button>
                        <button>2</button>
                        <button>3</button>
                        <button>4</button>
                        <button>5</button>
                        <button>&gt;</button>
                    </div>
                </div>
            </div>
            <div class="admin-table">
                <table class="admin-table__inner">
                    <tr class="admin-table__header">
                        <th class="admin-table__header-item">お名前</th>
                        <th class="admin-table__header-item">性別</th>
                        <th class="admin-table__header-item">メールアドレス</th>
                        <th class="admin-table__header-item">お問い合わせの種類</th>
                        <th class="admin-table__header-item"></th>
                    </tr>
                    <tr class="admin-table__row">
                        <td class="admin-table__item">
                            <form class="detail-form">
                                <div class="detail-form__item">
                                    <p class="detail-form__item-input" type="text" name="content">山田　太郎</p>
                                </div>
                            </form>
                        </td>
                        <td class="admin-table__item">
                            <form class="detail-form">
                                <div class="detail-form__item">
                                    <p class="detail-form__item-input" type="text" name="content">男性</p>
                                </div>
                            </form>
                        </td>
                        <td class="admin-table__item">
                            <form class="detail-form">
                                <div class="detail-form__item">
                                    <p class="detail-form__item-input" type="email" name="email">test@example.com</p>
                                </div>
                            </form>
                        </td>
                        <td class="admin-table__item">
                            <form class="detail-form">
                                <div class="detail-form__item">
                                    <p class="detail-form__item-input" type="text" name="content">商品の交換について</p>
                                </div>
                            </form>
                        </td>
                        <td class="admin-table__item">
                            <div class="admin-table__detail-label">
                                <label for="modal-toggle" style="cursor:pointer">詳細</label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>


</html>