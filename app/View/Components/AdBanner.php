<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdBanner extends Component
{
    public string $link;
    public string $headerTitle;
    public string $headerDesc;
    public string $image;
    public string $statusText;
    public string $brandName;
    public string $headline1;
    public string $headline2;
    public string $desc;
    public string $btnText;
    public string $disclaimer;
    public string $logo;
    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $link = '#',
        string $headerTitle = '',
        string $headerDesc = '',
        string $image = '',
        string $statusText = '',
        string $brandName = '',
        string $headline1 = '',
        string $headline2 = '',
        string $desc = '',
        string $btnText = '',
        string $disclaimer = '',
        string $logo = '',
        string $variant = 'desktop'
    ) {
        $this->link = $link;
        $this->headerTitle = $headerTitle;
        $this->headerDesc = $headerDesc;
        $this->image = $image;
        $this->statusText = $statusText;
        $this->brandName = $brandName;
        $this->headline1 = $headline1;
        $this->headline2 = $headline2;
        $this->desc = $desc;
        $this->btnText = $btnText;
        $this->disclaimer = $disclaimer;
        $this->logo = $logo;
        $this->variant = $variant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ad-banner');
    }
}
