<div class="search_result">
    <table>
        @foreach ($result as $colorVariation)
            <tr>
                <td class="search_result-name">
                    <a
                        href="{{ route('user.product', [
    'product' => $colorVariation->product->slug,
    'color' => $colorVariation->color->slug,
]) }}">{{ $colorVariation->product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}
                        @if($colorVariation->color->id !== 76){{ $colorVariation->color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) }}@endif</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
