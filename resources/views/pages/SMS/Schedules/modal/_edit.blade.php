<div class="modal fade" id="edit{{ $subject->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit</h5>

            </div>
            @livewire('schedule.edit',['schedule' => $schedule], key($schedule->id))
        </div>
    </div>
</div>
