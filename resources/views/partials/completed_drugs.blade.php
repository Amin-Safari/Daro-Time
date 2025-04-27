@foreach($completedDrugs as $drug)
    <tr>
        <td>{{ $drug->name }}</td>
        <td>{{ $drug->dosage }}</td>
        <td>{{ $drug->frequency }}</td>
        <td>{{ $drug->start_date }}</td>
        <td>{{ $drug->end_date }}</td>
    </tr>
@endforeach