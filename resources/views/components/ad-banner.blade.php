

<style>
    /* ==========================================
       CSS สำหรับขนาด Medium Rectangle (320x250)
    ========================================== */
    .custom-loan-banner {
        width: 100%;
        max-width: 350px;
        min-height: 250px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        font-family: 'Kanit', sans-serif;
        border: 1px solid #e2e8f0;
        text-decoration: none !important;
        margin: 0 auto;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        animation: gentleFloat 3s ease-in-out infinite;
    }

    .custom-loan-banner:hover {
        box-shadow: 0 8px 20px rgba(249, 115, 22, 0.15);
        animation-play-state: paused;
        transform: translateY(-8px);
    }

    .clb-header { background-color: #f8fafc; display: flex; align-items: center; padding: 10px 10px; border-bottom: 1px solid #f1f5f9; font-size: 11px; }
    .clb-dot { width: 6px; height: 6px; background-color: #f97316; border-radius: 50%; margin-right: 6px; }
    .clb-header-title { color: #1e293b; font-weight: bold; margin-right: 4px; }
    .clb-header-desc { color: #64748b; }

    .clb-body { display: flex; height: auto; min-height: 218px; align-items: stretch; flex: 1; }
    .clb-left { width: 35%; min-width: 100px; max-width: 120px; background-color: #0c1e33; display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative; }
    .clb-icon-wrapper {  width: 80%; height: 80%; margin: 16px; display: flex; align-items: center; justify-content: center;}

    .clb-badge-coin { position: absolute; top: -4px; right: -8px; background-color: #fbbf24; color: #0c1e33; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px; }
    .clb-status { background-color: rgba(30, 41, 59, 0.6); border: 1px solid #475569; padding: 4px 10px; border-radius: 20px; color: #ffffff; font-size: 10px; display: flex; align-items: center; margin-top: 1rem }
    .clb-status-dot { width: 6px; height: 6px; background-color: #10b981; border-radius: 50%; margin-right: 6px; }

    .clb-right { flex: 1; padding: 14px; background-color: #ffffff; display: flex; flex-direction: column; justify-content: space-between; }
    .clb-logo { background-color: #0D2A4A; padding: 10px; border-radius: 8px; margin-bottom: 8px; display: inline-block; max-width: 120px; }
    .clb-logo img { width: 100%; height: auto; display: block; border-radius: 5px;}

    .clb-headline { margin: 0 0 6px 0; line-height: 1.1; }
    .clb-headline-1 { font-size: 22px; font-weight: 900; color: #0c1e33; display: block; margin: 0; }
    .clb-headline-2 { font-size: 22px; font-weight: 900; color: #f97316; display: block; margin: 0; }
    .clb-desc { color: #64748b; font-size: 10px; line-height: 1.4; margin: 0 0 8px 0; }
    .clb-btn { background: linear-gradient(to right, #f97316, #ea580c); color: #ffffff !important; font-weight: bold; font-size: 12px; padding: 6px 14px; border-radius: 20px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }
    .clb-disclaimer { color: #94a3b8; font-size: 7.5px; line-height: 1.3; margin: 0; }

    @keyframes gentleFloat {
        0% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
        100% { transform: translateY(0); }
    }

    /* ==========================================
       CSS สำหรับขนาด Mobile Banner (320x100)
    ========================================== */
    .custom-loan-banner-mobile {
        display: flex;
        width: 100%;
        max-width: 350px;
        height: 100px; /* ล็อกความสูงไว้ที่ 100px */
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        font-family: 'Kanit', sans-serif;
        border: 1px solid #e2e8f0;
        text-decoration: none !important;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        margin: 0 auto;
    }
    .custom-loan-banner-mobile:hover {
        box-shadow: 0 6px 16px rgba(249, 115, 22, 0.15);
        transform: translateY(-4px);
    }

    .clb-m-left { width: 100px; background-color: #0c1e33; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .clb-m-right { flex: 1; padding: 10px 14px; display: flex; align-items: center; justify-content: space-between; background-color: #ffffff; }
    .clb-m-text { display: flex; flex-direction: column; justify-content: center; }
    .clb-m-eyebrow { color: #f97316; font-size: 9px; font-weight: bold; margin-bottom: 4px; }
    .clb-m-headline { line-height: 1.1; margin-bottom: 4px; }
    .clb-m-desc { font-size: 9px; color: #64748b; margin: 0; }

    .clb-m-btn-wrap { flex-shrink: 0; margin-left: 8px; }
    .clb-m-btn { background: linear-gradient(to right, #f97316, #ea580c); color: #ffffff !important; font-weight: bold; font-size: 11px; padding: 5px 12px; border-radius: 20px; display: flex; align-items: center; box-shadow: 0 4px 10px -2px rgba(224,112,15,.4); }
</style>


@if($variant === 'mobile')
    {{-- ==========================================
         เลย์เอาต์สำหรับ Mobile (320 x 100 px)
    ========================================== --}}
    <a href="{{ $link }}" target="_blank" {{ $attributes->merge(['class' => 'custom-loan-banner-mobile']) }}>
        <div class="clb-m-left">
            <div style="width: 44px; position: relative;">
                <img src="{{ asset($image) }}" alt="" style="border-radius: 10%; width: 100%; height: auto;">
                <div class="clb-badge-coin" style="top: -6px; right: -8px; width: 16px; height: 16px; font-size: 9px;">฿</div>
            </div>
        </div>
        <div class="clb-m-right">
            <div class="clb-m-text">
                <div class="clb-m-eyebrow">{{ $headerTitle }} - รถแลกเงิน</div>
                <div class="clb-m-headline">
                    <span style="font-size: 15px; font-weight: 900; color: #0c1e33;">{{ $headline1 }}</span>
                    <span style="font-size: 15px; font-weight: 900; color: #f97316;">{{ $headline2 }}</span>
                </div>
                <p class="clb-m-desc">เปลี่ยนรถเป็นทุน • {{ $statusText }}</p>
            </div>
            <div class="clb-m-btn-wrap">
                <div class="clb-m-btn">
                    เช็กวงเงิน <span style="margin-left: 4px;">&rarr;</span>
                </div>
            </div>
        </div>
    </a>

@else
    {{-- ==========================================
         เลย์เอาต์สำหรับ Medium Rectangle (320 x 250 px)
    ========================================== --}}
    <a href="{{ $link }}" target="_blank" {{ $attributes->merge(['class' => 'custom-loan-banner']) }}>
        <div class="clb-header">
            <div class="clb-dot"></div>
            <span class="clb-header-title">{{ $headerTitle }}</span>
            <span class="clb-header-desc">{{ $headerDesc }}</span>
        </div>
        <div class="clb-body">
            <div class="clb-left">
                <div class="clb-icon-wrapper">
                    <img src="{{ asset($image) }}" alt="" style="border-radius: 10%; width: 100%; height: auto;">
                    <div class="clb-badge-coin">฿</div>
                </div>
                <div class="clb-status">
                    <div class="clb-status-dot"></div>
                    {{ $statusText }}
                </div>
            </div>
            <div class="clb-right">
                <div class="clb-brand">
                    <div class="clb-logo">
                        <img src="{{ asset($logo) }}" alt="Logo">
                    </div>
                </div>
                <div class="clb-headline">
                    <h2 class="clb-headline-1">{{ $headline1 }}</h2>
                    <h2 class="clb-headline-2">{{ $headline2 }}</h2>
                </div>
                <p class="clb-desc">{{ $desc }}</p>
                <div class="clb-btn">
                    {{ $btnText }} <span>&rarr;</span>
                </div>
                <p class="clb-disclaimer">{{ $disclaimer }}</p>
            </div>
        </div>
    </a>
@endif
