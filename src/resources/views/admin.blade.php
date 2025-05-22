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
          <input type="date" class="search-form__item-date" name="date" value="{{request('date')}}" placeholder="年/月/日" />
          <div class="search-form__actions">
            <input class="search__button-submit" type="submit" value="検索" />
            <input class="reset__button-submit" type="reset" value="リセット" />
          </div>
        </div>
      </form>
    </div>

    <div class="option__line">
      <div class="option__item-export">
      <form action="{{'/export?'.http_build_query(request()->query())}}" method="post">
        @csrf
        <input class="export__btn btn" type="submit" value="エクスポート">
      </form>
      </div>
      <div class="option__item-pagination">
      {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
      </div>
    </div>

    <table class="admin-table">
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
          {{ $contact->category->content }}
        </td>
        <td>
          <button class="admin-table__detail-button"><a class="admin__detail-btn" href="#{{$contact->id}}">詳細</a></button>
        </td>
      </tr>


          <div class="modal" id="{{$contact->id}}">
            <a href="#!" class="modal-overlay"></a>
            <div class="modal__inner">
              <div class="modal__content">
                <form class="modal__detail-form" action="/delete" method="post">
                  @csrf
                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">お名前</label>
                    <p>{{$contact->first_name}}{{$contact->last_name}}</p>
                  </div>

                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">性別</label>
                    <p>
                      @if($contact->gender == 1)
                      男性
                      @elseif($contact->gender == 2)
                      女性
                      @else
                      その他
                      @endif
                    </p>
                  </div>

                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">メールアドレス</label>
                    <p>{{$contact->email}}</p>
                  </div>

                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">電話番号</label>
                    <p>{{$contact->tell}}</p>
                  </div>

                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">住所</label>
                    <p>{{$contact->address}}</p>
                  </div>

                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">お問い合わせの種類</label>
                    <p>{{$contact->category->content}}</p>
                  </div>

                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">お問い合わせ内容</label>
                    <p>{{$contact->detail}}</p>
                  </div>
                  <input type="hidden" name="id" value="{{ $contact->id }}">
                  <input class="modal-form__delete-btn btn" type="submit" value="削除">

                </form>
              </div>

              <a href="#" class="modal__close-btn">×</a>
            </div>
          </div>
          @endforeach
        </table>


      </div>


  </main>
</body>
</html>