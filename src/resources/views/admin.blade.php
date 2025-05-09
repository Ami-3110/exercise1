<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    </div>
    @if (Auth::check())
     <form action="/logout" method="post">
      @csrf
        <div class="header__nav">
         <button class="header-nav__button">logout</button>
         </div>
     </form>
    @endif
  </header>
  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>Admin</h2>
      </div>
    </div>
<form class="search-form" action="/admin/search" method="get">
  @csrf
  @method('search')
  <div class="search-form__item">
     <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}"/>
     <select class="search-form__item-select" name="category_id">
       <option value="">性別</option>
      @foreach($genders as $gender)
      <option value="{{ $gender->/*id*/}}">{{ $gender->/*name*/ }}</option>
      @endforeach
     </select>
     <select class="search-form__item-select" name="category_id">
       <option value="">お問い合わせの種類</option>
      @foreach($categories as $category)
      <option value="{{ $category->id}}">{{ $category->content }}</option>
      @endforeach
     </select>
     <input type="data" class="search-form__item-select" name="category_id" value="" placeholder="年/月/日" />
      @foreach($categories as $category)
      <option value="{{ $category->id}}">{{ $category->name }}</option>
      @endforeach
     </select>
   </div>
   /*Calender Search*/
   <div class="search-form__button">
     <button class="search-form__button-submit" type="submit">検索</button>
   </div>
   <div class="reset__button">
     <button class="reset__button-submit" type="submit">検索</button>
   </div>
 </form>
 /*EXPORT*/
 /*Pagenation*/






  </main>
</body>
</html>
