<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modalationTest</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}" />
</head>

<body>
    <input type="checkbox" id="modal-toggle" style="display:none;" />
        <div class="modal-overlay">
            <div class="modal-box">
                <label for="modal-toggle" class="close-btn">&times;</label>
            </div>
            <form class="form" action="" method="post">
            @csrf
            <div class="modal-table">
                <table class="modal-table__inner">
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お名前</th>
                        <td class="modal-table__text">
                            <input type="text" name="name" value="{{ $contact['full_name'] }}" readonly />
                            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly >
                            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly >
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">性別</th>
                        <td class="modal-table__text">
                            <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly >
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">メールアドレス</th>
                        <td class ="modal-table__text">
                            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">電話番号</th>
                        <td class="modal-table__text">
                            <input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header"> 住所
                        </th>
                        <td class="modal-table__text">
                            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header"> 建物名
                        </th>
                        <td class="modal-table__text">
                            <input type="text" name="building" value=" {{ $contact['building'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header"> お問い合わせ内容の種類
                        </th>
                        <td class="modal-table__text">
                            <input type="text" name="category_id" value="{{ $contact['category_id'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問い合わせ内容</th>
                        <td class="modal-table__text">
                            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal__button">
                <button class="modal__button-submit" type="submit">送信</button>
            </div>
            </form>
        </div>
    </main>
</body>
    </main>
</body>


</html>