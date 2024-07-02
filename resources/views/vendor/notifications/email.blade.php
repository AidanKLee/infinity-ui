<x-mail::layout>

    <!-- Greeting bar -->
    <table class="full" cellpadding="0" cellspacing="0" border="0" width="100">
        <tr>
            <td class="full" style="position:relative;">
                @if (!empty($greeting))
                    {{ $greeting }}
                @endif
            </td>
        </tr>
    </table>
    <!-- End greeting bar -->

    <!-- Intro lines -->
    <table class="full" cellpadding="0" cellspacing="0" border="0" width="100" style="padding:45px 30px 0;">
        @foreach ($introLines as $line)
            <x-mail::line>
                {{ $line }}
            </x-mail::line>
        @endforeach
    </table>
    <!-- End intro lines -->

    <!-- Action button -->
    @if (isset($actionText))
        <table class="full" cellpadding="0" cellspacing="0" border="0" width="100" style="padding:0 30px;">
            <tr>
                <td class="full" class="btn-wrapper">
                    <x-mail::button :url="$actionUrl">
                        {{ $actionText }}
                    </x-mail::button>
                </td>
            </tr>
        </table>
    @endif
    <!-- End action button -->

    <!-- Salutation -->
    <table class="full" cellpadding="0" cellspacing="0" border="0" width="100" style="padding:0 30px;">
        <tr>
            <td class="full">
                @if (!empty($salutation))
                    {{ $salutation }}
                @endif
            </td>
        </tr>
    </table>
    <!-- End salutation -->

    <!-- Action link -->
    @if (isset($actionText))
        <table class="full" cellpadding="0" cellspacing="0" border="0" width="100" style="padding:30px;">
            <tr>
                <td class="full" class="link-fail" style="color:#666666; word-break:break-word;">
                    <p style="margin-bottom: 0; padding-bottom: 0;">
                        If the link didn't work, paste this link into your browser <br>
                        <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
                    </p>
                </td>
            </tr>
        </table>
    @endif
    <!-- End action link -->

    <!-- Outro lines -->
    <table class="full" cellpadding="0" cellspacing="0" border="0" width="100" style="padding:0 30px;">
        @foreach ($outroLines as $line)
            <x-mail::line>
                {{ $line }}
            </x-mail::line>
        @endforeach
    </table>
    <!-- End outro lines -->

</x-mail::layout>
