@foreach($drugs as $drug)
    <div class="drug-item" id="drug-item-{{ $drug->id }}">
        <span>{{ $drug->name }}</span>
        <span>{{ $drug->dosage }} دوز باقی مانده</span>
        <span>{{ $drug->frequency }} ساعت تا دوز بعدی</span>
    </div>
@endforeach