{{-- Sticky Toolbar --}}
<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
    {{-- Item --}}
    <li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip"  title="Check Out Facebook Page" data-placement="right">
        <a class="btn btn-sm btn-icon btn-bg-light btn-text-primary btn-hover-primary" href="https://www.facebook.com/CITsanpablocity" target="_blank">
            <i class="flaticon-facebook-logo-button"></i>
        </a>
    </li>

    {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Visit Us on Twitter" data-placement="left">
        <a class="btn btn-sm btn-icon btn-bg-light btn-text-primary btn-hover-primary" href="https://www.twitter.com" target="_blank">
            <i class="flaticon-twitter-logo-button"></i>
        </a>
    </li>

    {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Email Us" data-placement="left">
        <a class="btn btn-sm btn-icon btn-bg-light btn-text-warning btn-hover-warning" href="https://google.com" target="_blank">
            <i class="flaticon2-telegram-logo"></i>
        </a>
    </li>

    {{-- Item --}}
    {{-- @if (config('layout.extras.chat.display') == true)
        <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Chat Example" data-placement="left">
            <a class="btn btn-sm btn-icon btn-bg-light btn-text-danger btn-hover-danger" href="#" data-toggle="modal" data-target="#kt_chat_modal">
                <i class="flaticon2-chat-1"></i>
            </a>
        </li>
    @endif --}}
</ul>
