@extends('user.layouts.main')

@section('content')
<div class="catalog">
    <div class="catalog__holder">
        <div class="page__row">


            @include('user.includes.profile-nav')

            <div class="page__middle">
                <div class="profile-edit profile__edit">
                    
                        <div class="profile-edit__row">
                            <div class="profile-edit__column">
                                <div class="profile-edit__item">
                                    <div class="profile-edit__holder">
                                        <h2 class="profile-edit__title">Адреса доставки</h2>

                                        @if($adresses->count() == 0)
                                            <h3>Нет существующих адресов, добавьте новый</h3>
                                        @endif

                                        @foreach($adresses as $adress)
                                        <div class="form__item">
                                            <label for="pass" class="form__label">{{$adress->country}} {{$adress->city}} {{$adress->street}} @if($adress->is_default) - используется по умолчанию @endif</label>
                                            <div class="form__field"><a href="{{route('user.edit-adress', $adress->id)}}" class="link ">Редактировать</a></div>
                                            <form method="post" action="{{route('user.delete-adress', $adress->id)}}">
                                                @csrf
                                                @method('delete')
                                                <div class="form__field"><button class="link ">Удалить адрес доставки</button></div>
                                            </form>
                                        </div>
                                        @endforeach

                                        <div class="form__item">
                                            <div class="form__field"><a href="{{route('user.create-adress')}}" class="link ">Добавить новый адрес доставки</a></div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                </div>

                


            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/jquery.infinitescroll.js')}}"></script>
<script src="{{asset('assets/js/yii.js')}}"></script>
<script src="{{asset('assets/js/yii.validation.js')}}"></script>
<script src="{{asset('assets/js/yii.activeform.js')}}"></script>
<script src="{{asset('assets/js/jquery.pjax.js')}}"></script>
<script src="{{asset('assets/js/chunks/vendor.js')}}"></script>
<script src="{{asset('assets/js/chunks/layout-base.js')}}"></script>
<script src="{{asset('assets/js/intellinput.js')}}"></script>
<script src="{{asset('assets/js/whishlist/scripts.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/autocomplete.js')}}"></script>
<script src="{{asset('assets/js/base/scripts.js')}}"></script>
<script src="{{asset('assets/js/utils.js')}}"></script>
@endsection

@section('head')
<title>Интернет-магазин детской одежды - Дом на дереве</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
<meta name="description" content="Большой выбор женской одежды, платья, рубашки, костюмы, верхняя одежда, аксессуары. Доставка.">
<link rel="stylesheet" href="{{asset('assets/js/base/styles.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/fast-catalog-item/styles.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/intellinput.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/autocomplete.css')}}">
<style>
    /* SITEDEV-2039 */

    .catalog-list__info_head {
        min-height: auto;
    }

    .catalog-list__info_head,
    .catalog-list__not-available {
        margin-bottom: 15px;
    }

    .catalog-list__sale {
        position: initial;
    }

    /* SITEDEV-2039 END */
</style>
<style>
    .mobile .card-speed-buy {
        bottom: 0;
        padding: 10px 40px;
    }

    .mobile .card-speed-buy .catalog-list__link,
    .mobile .card-speed-buy .card-sizes,
    .mobile .card-speed-buy .card__button-wrapper {
        display: none;
    }

    .mobile .card-speed-buy .card__wish {
        display: block;
    }
</style>
<style>
    .no-surname-show {
        display: none;
    }

    .no-surname .no-surname-show {
        display: block;
    }

    .no-surname .no-surname-hide {
        display: none;
    }
</style>
@endsection

@section('html-class')
<html lang="ru-RU" class="">
@endsection