@extends('user.layouts.main')

@section('content')
    <div class="blog">
        <div class="blog__holder">
            <div class="page__row">
                <div data-holder=".blog" class="page__sidebar page__sidebar_left js-sticky-sidebar media-query-show_wide">
                    <div class="page__title">Lookbook</div>
                </div>
                <div class="page__middle">
                    <div id="p0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
                        <div id="w0" class="blog-previews-list list-view">
                            @if ($lookbooks->count() > 0)
                                <div class="lookbook-item" data-key="{{ $lookbooks->first()->id }}">
                                    <div class="blog-previews blog-previews-list__item ">
                                        <a href="{{ route('user.lookbook', $lookbooks->first()->id) }}"
                                            class="blog-previews__wrap">
                                            <img class="blog-previews__img" src="{{ asset( $lookbooks->first()->category_img) }}"
                                                alt="{{ $lookbooks->first()->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}">
                                            <div class="blog-previews__text">
                                                <div class="blog-previews__header">
                                                    {{ $lookbooks->first()->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="lookbook-row">
                                    @foreach ($lookbooks->skip(1) as $lookbook)

                                        <div class="lookbook-item" data-key="{{ $lookbook->id }}">
                                            <div class="blog-previews blog-previews-list__item short" data-index="">
                                                <a href="{{ route('user.lookbook', $lookbook->id) }}"
                                                    class="blog-previews__wrap">
                                                    <img class="blog-previews__img" src="{{ asset( $lookbook->category_img )}}"
                                                        alt="{{ $lookbook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}">
                                                    <div class="blog-previews__text">
                                                        <div class="blog-previews__header">
                                                            {{ $lookbook->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                                                        </div>
                                                        <div class="blog-previews__date">&nbsp;</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @if ($loop->iteration % 2 == 0)
                                            </div>
                                            <div class="lookbook-row">
                                        @endif
                                    @endforeach
                                </div>
                                @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/yii.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/chunks/layout-base.js') }}"></script>
    <script src="{{ asset('assets/base/scripts.js') }}"></script>
@endsection

@section('head')
    <title>Лукбуки в интернет-магазине — Дом на дереве</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Лукбуки в интернет-магазине Дом на дереве">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/fast-catalog-item/styles.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/autocomplete.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/base/styles.css') }}">


@endsection

@section('html-class')
    <html lang="ru-RU" class="t-card page-product__html">
@endsection
