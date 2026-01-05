@csrf
<div class="mb-3">
    <label for="week_start_date" class="form-label">Week Start Date</label>
    <input type="date" class="form-control" id="week_start_date" name="week_start_date" value="{{ old('week_start_date', $availability->week_start_date ?? '') }}" required>
</div>

<h5>Availability Slots</h5>
<div id="slots-container">
    @if(old('slots'))
        @foreach(old('slots') as $i => $slot)
            <div class="row mb-2 slot">
                <div class="col">
                    <select name="slots[{{ $i }}][day_of_week]" class="form-select" required>
                        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                            <option value="{{ $day }}" {{ $slot['day_of_week'] == $day ? 'selected' : '' }}>{{ $day }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="time" name="slots[{{ $i }}][start_time]" class="form-control" value="{{ $slot['start_time'] }}" required>
                </div>
                <div class="col">
                    <input type="time" name="slots[{{ $i }}][end_time]" class="form-control" value="{{ $slot['end_time'] }}" required>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger remove-slot">Remove</button>
                </div>
            </div>
        @endforeach
    @else
        <div class="row mb-2 slot">
            <div class="col">
                <select name="slots[0][day_of_week]" class="form-select" required>
                    @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                        <option value="{{ $day }}">{{ $day }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="time" name="slots[0][start_time]" class="form-control" required>
            </div>
            <div class="col">
                <input type="time" name="slots[0][end_time]" class="form-control" required>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-danger remove-slot">Remove</button>
            </div>
        </div>
    @endif
</div>

<button type="button" class="btn btn-secondary mb-3" id="add-slot">Add Slot</button>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let container = document.getElementById('slots-container');
    let index = container.querySelectorAll('.slot').length;

    document.getElementById('add-slot').addEventListener('click', () => {
        let row = document.createElement('div');
        row.classList.add('row', 'mb-2', 'slot');
        row.innerHTML = `
            <div class="col">
                <select name="slots[${index}][day_of_week]" class="form-select" required>
                    @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                        <option value="{{ $day }}">{{ $day }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="time" name="slots[${index}][start_time]" class="form-control" required>
            </div>
            <div class="col">
                <input type="time" name="slots[${index}][end_time]" class="form-control" required>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-danger remove-slot">Remove</button>
            </div>
        `;
        container.appendChild(row);
        index++;
    });

    container.addEventListener('click', e => {
        if(e.target.classList.contains('remove-slot')){
            e.target.closest('.slot').remove();
        }
    });
});
</script>
