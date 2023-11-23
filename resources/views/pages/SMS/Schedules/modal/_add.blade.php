<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Add Schedule</h5>

            </div>
            @livewire('schedule.add',['subjects'=> $subjects,'sections' => $sections,'teachers'=>$teachers,'specializations'=>$specializations,'semesters'=>$semesters])

        </div>
    </div>
</div>
