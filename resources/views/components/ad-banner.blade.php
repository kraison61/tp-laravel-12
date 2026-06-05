<style>
    /* CSS เฉพาะของแบนเนอร์ */
    .custom-loan-banner {
        /* display: block; */
        width: 100%;
        /* 💡 ให้กว้างเต็มพื้นที่ที่ Bootstrap กำหนด */
        max-width: 350px;
        /* 💡 แต่กว้างสุดไม่เกิน 350px จะได้ไม่ดูเทอะทะบนจอคอม */
        /* height: auto; */
        /* 💡 ให้ความสูงปรับตามเนื้อหา */
        min-height: 250px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        font-family: 'Kanit', sans-serif;
        border: 1px solid #e2e8f0;
        text-decoration: none !important;
        transition: box-shadow 0.3s ease;
        margin: 1rem auto;
        /* 💡 แถม margin auto ให้อยู่ตรงกลางเสมอ */

        height: 100%;
        display: flex;
        flex-direction: column;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        animation: gentleFloat 3s ease-in-out infinite;
    }

    .custom-loan-banner:hover {
        /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-decoration: none !important; */
        box-shadow: 0 8px 20px rgba(249, 115, 22, 0.15);
        /* แสงเงาสีส้มเบาๆ */
        animation-play-state: paused;
        transform: translateY(-10px);
    }

    .clb-header {
        background-color: #f8fafc;
        display: flex;
        align-items: center;
        padding: 10px 10px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 11px;
    }

    .clb-dot {
        width: 6px;
        height: 6px;
        background-color: #f97316;
        border-radius: 50%;
        margin-right: 6px;
    }

    .clb-header-title {
        color: #1e293b;
        font-weight: bold;
        margin-right: 4px;
    }

    .clb-header-desc {
        color: #64748b;
    }

    .clb-body {
        display: flex;
        height: auto;
        min-height: 218px;
        align-items: stretch;
        /* 💡 สั่งให้ฝั่งซ้ายและขวาสูงเท่ากันเสมอ */
        flex: 1;
    }

    .clb-left {
        width: 35%;
        /* 💡 ใช้เป็นเปอร์เซ็นต์แทน */
        min-width: 100px;
        /* 💡 แต่ห้ามแคบกว่า 100px ไม่งั้นไอคอนเบียด */
        max-width: 120px;
        /* 💡 และไม่กว้างเกิน 120px */
        background-color: #0c1e33;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .clb-icon-wrapper {
        position: relative;
        width: 80%;
        height: 80%;
        margin: 16px;
    }

    .clb-icon-wrapper svg {
        width: 100%;
        height: 100%;
        color: #ffffff;
    }

    .clb-badge-coin {
        position: absolute;
        top: -4px;
        right: -8px;
        background-color: #fbbf24;
        color: #0c1e33;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 10px;
    }

    .clb-status {
        background-color: rgba(30, 41, 59, 0.6);
        border: 1px solid #475569;
        padding: 4px 10px;
        border-radius: 20px;
        color: #ffffff;
        font-size: 10px;
        display: flex;
        align-items: center;
        margin-top: 1rem
    }

    .clb-status-dot {
        width: 6px;
        height: 6px;
        background-color: #10b981;
        border-radius: 50%;
        margin-right: 6px;
    }

    .clb-right {
        flex: 1;
        padding: 14px;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .clb-brand {
        display: flex;
        align-items: center;
        margin-bottom: 6px;
    }

    .clb-brand-icon {
        background-color: #f97316;
        color: white;
        border-radius: 4px;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 6px;
    }

    .clb-brand-icon svg {
        width: 14px;
        height: 14px;
    }

    .clb-brand-name {
        color: #0c1e33;
        font-weight: 900;
        font-size: 11px;
        margin: 0;
    }

    .clb-headline {
        margin: 0 0 6px 0;
        line-height: 1.1;
    }

    .clb-headline-1 {
        font-size: 22px;
        font-weight: 900;
        color: #0c1e33;
        display: block;
        margin: 0;
    }

    .clb-headline-2 {
        font-size: 22px;
        font-weight: 900;
        color: #f97316;
        display: block;
        margin: 0;
    }

    .clb-desc {
        color: #64748b;
        font-size: 10px;
        line-height: 1.4;
        margin: 0 0 8px 0;
    }

    .clb-btn {
        background: linear-gradient(to right, #f97316, #ea580c);
        color: #ffffff !important;
        font-weight: bold;
        font-size: 12px;
        padding: 6px 14px;
        border-radius: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .clb-disclaimer {
        color: #94a3b8;
        font-size: 7.5px;
        line-height: 1.3;
        margin: 0;
    }

    /* 💡 1. สร้างจังหวะการขยับ (ลอยขึ้น 6px แล้วลงมาที่เดิม) */
    @keyframes gentleFloat {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0);
        }
    }
</style>


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
                <div class="clb-status">
                    <div class="clb-status-dot"></div>
                    {{ $statusText }}
                </div>
            </div>
        </div>
        <div class="clb-right">
            <div class="clb-brand">
                <div class="clb-brand-icon">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 17a1 1 0 01-2 0m2 0a1 1 0 00-2 0m2 0h6m-9 0H4m16 0a1 1 0 01-2 0m2 0a1 1 0 00-2 0m2 0h-2M4 17v-4m16 4v-4m0 0a2 2 0 00-2-2h-3m-9 0H4m6 0v-4a2 2 0 012-2h4a2 2 0 012 2v4" />
                    </svg>
                </div>
                <h4 class="clb-brand-name">{{ $brandName }}</h4>
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