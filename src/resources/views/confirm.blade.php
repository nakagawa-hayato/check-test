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
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
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
        <div class="confirm-form__content">
            <div class="confirm-form__heading">
                <h2>Confirm</h2>
            </div>
        <form class="form" action="/confirm" method="POST">
            @csrf
            <div class="confirm-table">
                <table class="confirm-table__inner">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__text">
                            <input type="text" name="name" value="{{ $contact['full_name'] }}" readonly />
                            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly >
                            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly >
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly >
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class ="confirm-table__text">
                            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__text">
                            <input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header"> 住所
                        </th>
                        <td class="confirm-table__text">
                            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header"> 建物名
                        </th>
                        <td class="confirm-table__text">
                            <input type="text" name="building" value=" {{ $contact['building'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header"> お問い合わせ内容の種類
                        </th>
                        <td class="confirm-table__text">
                            <input type="text" name="category_id" value="{{ $contact['category_name'] }}" readonly />
                            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせ内容</th>
                        <td class="confirm-table__text">
                            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="confirm__button">
                <button class="confirm__button-submit" type="submit">送信</button>
                <a class="correction" href="">修正</a>
            </div>
            </form>
        </div>
    </main>
</body>

</html>