@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection
@section('content')
<div class="contact-form__content">
      <div class="contact-form__heading">
       <h2>Contact</h2>
      <form class="form" action="/contacts/first/" method="post">
        @csrf
        <table class="form__table">
          <tr class="form__table-row">
            <th class="form__label--item">お名前<span class="form__label--required">※</span>
            </th>
            <td class="form__input--text">
              <input type="text" name="name__last" placeholder="例: 山田" value="{{ old('name') }}"/>
              <input type="text" name="name__first" placeholder="例: 太郎" value="{{ old('name') }}"/>
            </td>
          </tr>
          <tr class="form__error">
            <!-- @error('name')
	            {{ $message }}
	            @enderror -->
          </tr>
          
          <tr class="form__table-title">
            <th class="form__label--item">性別<span class="form__label--required">※</span>
            </th>
            <td class="form__input--radio">
              <input type="radio" name="sex" value="male" checked >男性
              <input type="radio" name="sex" value="female" />女性
              <input type="radio" name="sex" value="else" />その他
            </td>
          </tr>
           <tr class="form__error">
            <!--	@error('email')
	            {{ $message }}
	            @enderror -->
          </tr>

          <tr class="form__table-title">
            <th class="form__label--item">メールアドレス<span class="form__label--required">※</span>
            </th>
            <td class="form__input--text">
              <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}"/>
            </td>
          </tr>
          <tr class="form__error">
            <!--	@error('email')
	            {{ $message }}
	            @enderror -->
          </tr>

          <tr class="form__table-title">
            <th class="form__label--item">電話番号<span class="form__label--required">※</span>
            </th>
            <td class="form__input--text">
              <input type="tel" name="tel_prefix" placeholder="080" value="{{ old('tel_prefix') }}"/>-<input type="tel" name="tel_middle" placeholder="1234" value="{{ old('tel_middle') }}"/>-<input type="tel" name="tel_suffix" placeholder="5678" value="{{ old('tel_suffix') }}"/>
            </td>
          </tr>
          <tr class="form__error">
              <!--	@error('tel')
	            {{ $message }}
	            @enderror -->
          </tr>
      
          <tr class="form__table-title">
            <th class="form__label--item">住所<span class="form__label--required">※</span>
            </th>
            <td class="form__input--text">
              <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
            </td>
          </tr>
          <tr class="form__error">
              <!--	@error('address')
	            {{ $message }}
	            @enderror -->
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
              <select class="category" name="category">
                <option value="">選択してください</option>
                {{-- @foreach($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name }}</option>
                @endforeach --}}              
              </select>
            </td>
          </tr>

          <tr class="form__table-title">
            <th class="form__label--item">お問い合わせ内容<span class="form__label--required">※</span>
            </th>
            <td class="form__input--textarea">
              <textarea name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content') }}</textarea>
            </td>
          </tr>
        </table>

        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
@endsection