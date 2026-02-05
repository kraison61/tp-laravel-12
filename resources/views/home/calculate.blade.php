@extends('layouts.app')

@section('title', 'ถมดิน 1 ไร่ สูง 1 เมตร ใช้ดินกี่คิว? พร้อมคำนวณราคา วิธีถมดินไม่ให้ทรุด ปี 2568')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-stats"></i> คำนวณปริมาณดินถมที่</h3>
                </div>
                <div class="panel-body">

                    <label>ขนาดพื้นที่</label>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="input-group">
                                <input type="number" id="rai" class="form-control" value="0" min="0">
                                <span class="input-group-addon">ไร่</span>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="input-group">
                                <input type="number" id="ngan" class="form-control" value="0" min="0" max="3">
                                <span class="input-group-addon">งาน</span>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="input-group">
                                <input type="number" id="wa" class="form-control" value="0" min="0" max="99">
                                <span class="input-group-addon">วา</span>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="height">ความสูงที่ต้องการถม</label>
                                <div class="input-group">
                                    <input type="number" id="height" class="form-control" placeholder="0.00" step="0.1">
                                    <span class="input-group-addon">เมตร</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="shrink">เผื่อดินยุบตัว</label>
                                <select id="shrink" class="form-control">
                                    <option value="0">ไม่เผื่อ</option>
                                    <option value="20" selected>20% (มาตรฐาน)</option>
                                    <option value="30">30% (ดินร่วน/เลน)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="well text-center" style="background-color: #f0f7ff; border-color: #d1e9ff;">
                        <p class="text-primary" style="margin-bottom: 5px;"><strong>ปริมาณดินที่ต้องใช้ประมาณ</strong></p>
                        <h2 style="margin-top: 0; color: #2c3e50;">
                            <span id="result">0.00</span> <small>ลูกบาศก์เมตร (คิว)</small>
                        </h2>
                    </div>

                </div>
                <div class="panel-footer text-muted small">
                    * หมายเหตุ: 1 ไร่ = 4 งาน, 1 งาน = 100 ตารางวา
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="page-header">
                <h3 class="text-primary">สาระน่ารู้เรื่องการถมดิน</h3>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4><strong>1. ถมดิน 1 ไร่ สูง 1 เมตร ใช้ดินกี่คิว?</strong></h4>
                    <p>พื้นฐานการคำนวณปริมาณดินที่ต้องใช้ สามารถใช้สูตรคณิตศาสตร์ง่าย ๆ:</p>
                    <div class="well well-sm">
                        <ul>
                            <li>พื้นที่ 1 ไร่ = 1,600 ตารางเมตร</li>
                            <li>ความสูงที่ต้องการถม = 1 เมตร</li>
                            <li><strong>ปริมาณดินที่ต้องใช้ = 1,600 x 1 = 1,600 ลูกบาศก์เมตร หรือ 1,600 คิว</strong></li>
                        </ul>
                    </div>
                    <p class="text-muted small">* หมายเหตุ: ขึ้นอยู่กับลักษณะดินเดิม, การบดอัด และระดับความแน่นที่ต้องการ อาจเผื่อไว้ 5-10%</p>

                    <h4><strong>2. ราคา ถมดิน 1 ไร่ สูง 1 เมตร เท่าไหร่?</strong></h4>
                    <p>ราคาถมดินจะขึ้นอยู่กับหลายปัจจัย เช่น ประเภทของดิน, ระยะทางขนส่ง และค่าเครื่องจักร</p>
                    <table class="table table-bordered">
                        <tr class="active">
                            <th>รายการการคำนวณ</th>
                            <th>ราคาประมาณการ</th>
                        </tr>
                        <tr>
                            <td>ค่าดิน (เฉลี่ย 150-250 บาท/คิว) x 1,600 คิว</td>
                            <td>320,000 บาท</td>
                        </tr>
                        <tr>
                            <td>ค่าแรง/เครื่องจักร (แบคโฮ, รถบด)</td>
                            <td>50,000 - 100,000 บาท</td>
                        </tr>
                        <tr class="success">
                            <td><strong>รวมราคาทั้งหมดโดยประมาณ</strong></td>
                            <td><strong>350,000 - 420,000 บาท</strong></td>
                        </tr>
                    </table>

                    <h4><strong>3. ถมดิน ต้องขออนุญาตไหม?</strong></h4>
                    <div class="alert alert-warning">
                        <p><strong>ตาม พ.ร.บ. ควบคุมอาคาร พ.ศ. 2522:</strong> การถมที่ดินที่สูงเกิน 0.5 เมตร ต้องยื่นขออนุญาตจากเขต หรือ อบต. โดยเฉพาะหากติดเขตเพื่อนบ้านหรือใกล้แหล่งน้ำสาธารณะ</p>
                    </div>

                    <h4><strong>4. เทคนิคถมดินสร้างบ้านไม่ให้ทรุด</strong></h4>
                    <ul class="list-group">
                        <li class="list-group-item"><i class="glyphicon glyphicon-ok"></i> <strong>บดอัดเป็นชั้น:</strong> ทุก 30-50 ซม. แล้วบดอัดให้แน่น</li>
                        <li class="list-group-item"><i class="glyphicon glyphicon-ok"></i> <strong>เลือกดินที่เหมาะสม:</strong> เช่น ดินลูกรัง หรือดินเหนียวผสมลูกรัง</li>
                        <li class="list-group-item"><i class="glyphicon glyphicon-ok"></i> <strong>พักหน้าดิน:</strong> ไว้อย่างน้อย 3-6 เดือน</li>
                    </ul>
                </div>
            </div>

            <hr>
            <h3 class="text-primary">คำถามที่พบบ่อย (FAQ)</h3>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">ถมดินคันละเท่าไหร่?</h4>
                    </div>
                    <div class="panel-body">ประมาณ 1,500 - 2,500 บาท/คัน (ขึ้นอยู่กับขนาดรถ 5-10 คิว)</div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">ถมดินสูงกว่าข้างบ้านผิดกฎหมายไหม?</h4>
                    </div>
                    <div class="panel-body">ทำได้ แต่ต้องมีระบบกันดินไหล เช่น กำแพงกันดิน และไม่ละเมิดสิทธิ์เพื่อนบ้าน</div>
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-6">
                    <h4 class="text-success">เคล็ดลับการเลือกผู้รับเหมา</h4>
                    <ul class="small">
                        <li>มีผลงานและรีวิวชัดเจน</li>
                        <li>ออกใบเสนอราคาละเอียด</li>
                        <li>มีเครื่องจักรครบ (แบคโฮ, รถดั๊มพ์)</li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <h4 class="text-success">ทำไมต้องจ้างมืออาชีพ?</h4>
                    <ul class="small">
                        <li>ประหยัดงบ ไม่บานปลาย</li>
                        <li>วางแผนงานวิศวกรรมถูกต้อง</li>
                        <li>งานไม่พัง ไม่ทรุดในอนาคต</li>
                    </ul>
                </div>
            </div>

            <div class="well text-center" style="background-color: #2c3e50; color: white; margin-top: 40px;">
                <h3>บริการถมดินใกล้ฉัน - ธีรพงษ์เซอร์วิส</h3>
                <p>ทีมงานผู้เชี่ยวชาญด้านถมดินกว่า 20 ปี ให้บริการทั่วประเทศ</p>
                <div style="font-size: 1.2em; margin: 20px 0;">
                    <p><i class="glyphicon glyphicon-phone"></i> โทร: <strong>062-718-8847</strong></p>
                    <p><i class="glyphicon glyphicon-user"></i> Line/FB: <strong>0627188847 / ธีรพงษ์เซอร์วิส</strong></p>
                </div>
                <button class="btn btn-warning btn-lg">ติดต่อประเมินหน้างานฟรี!</button>
            </div>

            <p class="text-center text-muted" style="margin-top: 20px;">
                <small>ปรับปรุงล่าสุด ปี 2568 | ข้อมูลโดยผู้เชี่ยวชาญด้านงานดิน</small>
            </p>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // ฟังก์ชันคำนวณที่เราเขียนไว้
    $('#rai, #ngan, #wa, #height, #shrink').on('input change', function() {
        var rai = parseFloat($('#rai').val()) || 0;
        var ngan = parseFloat($('#ngan').val()) || 0;
        var wa = parseFloat($('#wa').val()) || 0;
        var height = parseFloat($('#height').val()) || 0;
        var shrink = parseFloat($('#shrink').val()) || 0;

        var totalArea = (rai * 1600) + (ngan * 400) + (wa * 4);
        var volume = totalArea * height;
        var finalVolume = volume * (1 + (shrink / 100));

        $('#result').text(finalVolume.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }));
    });
});
</script>
@endpush
