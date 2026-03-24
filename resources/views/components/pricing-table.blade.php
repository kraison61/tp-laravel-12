@props(['prices'])

  @if(isset($prices) && $prices->isNotEmpty())
  <div class="table-responsive">
      <table class="table table-bordered table-hover">
          <thead>
              <tr class="active">
                  <th>รายการ</th>
                  <th class="text-center">ราคาต่อหน่วย (บาท)</th><th class="text-center">หน่วย</th>
              </tr>
          </thead>
          <tbody>
              @foreach($prices as $price)
              <tr>
                  <td><strong>{{ $price->name }}</strong></td>
                  <td class="text-center">
                      @if($price->price_type === 'call_to_ask') <span class="label label-default">สอบถามราคา</span>
                      @elseif($price->price_type === 'starting') เริ่มต้น {{ number_format($price->price, 0) }}
                      @elseif($price->price_type === 'range') {{ number_format($price->price, 0) }} – {{ number_format($price->max_price, 0) }}
                      @else {{ number_format($price->discount_price ?? $price->price, 0) }}
                      @endif
                  </td>
                  <td class="text-center">{{ $price->unit_text ?? '-' }}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
  @endif