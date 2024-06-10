<div>
    <form wire:submit.prevent="save">
        <div class="modal-body">
            @csrf
            <div class="row mb-3">
                <div class="col-md-5">
                    <label class="form-label fw-bold text-black" for="day">Day</label>
                    <select class="form-control @error('selected_day') is-invalid @enderror" id="selected_day"
                        name="selected_day" wire:model='selected_day'>
                        <option selected value="">-- Select Day --</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="All">All</option>
                    </select>
                    @error('selected_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-7">
                    <div class="p-1">
                        @forelse ($days as $i => $day)
                            <button class="badge text-white bg-primary border-0 mx-1 mt-1" type="button"
                                wire:click='removeDay({{ $i }})'>{{ $day }}</button>
                        @empty
                            <div class="d-flex justify-content-center align-items-center">
                                <span>Select Day.</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">

                    <label class="form-label fw-bold text-black" for="start_time">Start</label>
                    <input type="time" class="form-control" id="start_time" name="start_time"
                        wire:model='start_time'>
                </div>
                <div class="col-md-4">

                    <label class="form-label fw-bold text-black" for="end_time">End</label>
                    <input type="time" class="form-control" id="end_time" name="end_time" wire:model="end_time">
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" id="submit-e" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
