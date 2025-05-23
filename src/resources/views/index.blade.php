@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection
@section('content')
<div class="contact-form__content">
      <div class="contact-form__heading">
       <h2>Contact</h2>
      <form class="form" action="/confirm/" method="post">
        @csrf
        <table class="form__table">
          <tr class="form__table-row">
            <th class="form__label--item">お名前<span class="form__label--required">※</span>
            </th>
            <td class="form__input--text">
              <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}"/><br><input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}"/>
            </td>
          </tr>
          <tr class="form__error">
            <th></th>
              <td class="form__error-message">
              @error('last_name')
	            {{ $message }}
              @enderror
              @error('first_name')
	            {{ $message }}
	            @enderror
              </td>
          </tr>
          
          <tr class="form__table-title">
            <th class="form__label--item">性別<span class="form__label--required">※</span>
            </th>
            <td class="form__input--radio">
              <label><input type="radio" name="gender" value="1" checked />男性 </label>
              <label><input type="radio" name="gender" value="2" />女性 </label>
              <label><input type="radio" name="gender" value="3"  />その他 </label>
            </td>
          </tr>
           <tr class="form__error">
              <th></th>
                <td class="form__error-message">
              @error('gender')
	            {{ $message }}
	            @enderror
                </td>
          </tr>

          <tr class="form__table-title">
            <th class="form__label--item">メールアドレス<span class="form__label--required">※</span>
            </th>
            <td class="form__input--text">
              <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}"/>
            </td>
          </tr>
          <tr class="form__error">
            <th></th>
              <td class="form__error-message">
              @error('email')
	            {{ $message }}
	            @enderror
              </td>
          </tr>

          <tr class="form__table-title">
            <th class="form__label--item">電話番号<span class="form__label--required">※</span>
            </th>
            <td class="form__input--text">
              <input type="tel" name="tel1" placeholder="080" value="{{ old('tel1') }}"/>_<input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}"/>_<input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}"/>
            </td>
          </tr>
          <tr class="form__error">
            <th></th>
              <td class="form__error-message">
              @if ($errors -> has('tel1'))
              {{$errors -> first('tel1')}}
              @elseif ($errors -> has('tel2'))
              {{$errors -> first('tel2')}}
              @else
              {{$errors -> first('tel3')}}
              @endif
              </td>
          </tr>
      
          <tr class="form__table-title">
            <th class="form__label--item">住所<span class="form__label--required">※</span>
            </th>
            <td class="form__input--text">
              <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
            </td>
          </tr>
          <tr class="form__error">
            <th></th>
              <td class="form__error-message">
              @error('address')
	            {{ $message }}
	            @enderror
              </td>
          </tr>
        
          <tr class="form__table-title">
            <th class="form__label--item">建物名</th>
            <td class="form__input--text">
              <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}"/>
            </td>
          </tr>

          <tr class="form__table-title">
            <th class="form__label--item">お問い合わせの種類<span class="form__label--required">※</span>
            </th>
            <td class="form__input--text">
              <select class="category" name="category_id">
                <option value="">選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach              
              </select>
            </td>
          </tr>
          <tr class="form__error">
            <th></th>
              <td class="form__error-message">
              @error('category_id')
	            {{ $message }}
	            @enderror
            </td>
          </tr>

          <tr class="form__table-title">
            <th class="form__label--item">お問い合わせ内容<span class="form__label--required">※</span>
            </th>
            <td class="form__input--textarea">
              <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
            </td>
          </tr>
          <tr class="form__error">
            <th></th>
            <td class="form__error-message">
              @error('detail')
	            {{ $message }}
	            @enderror
            </td>
          </tr>
        </table>

        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
@endsection