<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <h2>FashionablyLate</h2>
    @if (Auth::check())
     <form class="form" action="/logout" method="post">
      @csrf
      <div class="header__nav">
        <button class="header-nav__button">logout</button>
      </div>
     </form>
    @endif
    </div>
  </header>

  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>Admin</h2>
      </div>
    </div>
    <div class="search__line">
      <form class="search-form" action="/admin/search" method="get">
        @csrf
        @method('search')
        <div class="search-form__item">
          <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}"/>
          <select class="search-form__item-gender" name="gender">
            <option value="">性別</option>
            <option name ="gender" value="1">男性</option>
            <option name ="gender" value="2">女性</option>
            <option name ="gender" value="3">その他</option>
          </select>
          <select class="search-form__item-type" name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
            <option value="{{ $category->id}}">{{ $category->content }}</option>
            @endforeach
          </select>
          <input type="text" class="search-form__item-date" id="" name="created_at" value="" placeholder="年/月/日" />
          <button class="search__button-submit" type="submit">検索</button>
          <button class="reset__button-submit" type="reset">リセット</button>
        </div>
      </form>
    </div>

    <div class="option__line">
      <button class="option__item-export">エクスポート</button>
      <div class="pagenation"></div>
    </div>

 <div class="admin-table">
    <table class="admin-table__inner">
      <tr class="admin-table__row">
        <th class="admin-table__header">
         <span class="admin-table__header-span">お名前</span>
        </th>
        <th class="admin-table__header">
         <span class="admin-table__header-span">性別</span>
        </th>
        <th class="admin-table__header">
         <span class="admin-table__header-span">メールアドレス</span>
        </th>
        <th class="admin-table__header">
         <span class="admin-table__header-span">お問い合わせの種類</span>
        </th>
        <th class="admin-table__header"></th>
      </tr>
        @foreach($contacts as $contact)
      <tr class="admin-table__row">
        <td class="admin-table__item">
          {{ $contact['last_name'] }}
          {{ $contact['first_name'] }}
        </td>
        <td class="admin-table__item">
          @if ($contact['gender'] === 1)
          男性
          @elseif ($contact['gender'] === 2)
          女性
          @else
          その他
          @endif
        </td>
        <td class="admin-table__item">
          {{ $contact['email'] }}
        </td>
        <td class="admin-table__item">
          {{ $category['content'] }}
        </td>
        <td>
          <button class="admin-table__detail-button">詳細</button>
        </td>
      </tr>
      @endforeach
      </table>
 </div>


  </main>
</body>
</html>