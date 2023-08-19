<div>
    <div>{{ $name }}</div>
    <form wire:submit.prevent="what">
        <div class="grid grid-cols-2">
            <div class="">
                <label for="">Enter Name</label>
                <input type="text" wire:model="name" class="form-control input-sm"  placeholder="Name">
            </div>
            <div class="">
                <label>Enter Email</label>
                <input type="email" class="form-control input-sm" placeholder="Enter email" wire:model="email_address">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>