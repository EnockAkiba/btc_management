<form action="#" >
    <div class="input-group">
        <div class="flex w-full">
            <div class="">
                <label for="img-input" id="photoShow" class="mx-2">
                    <img class="rounded-3xl shadow-sm " src="" style="max-height: 40px; max-width:40px" id='file-preview'>
                    <i class="fa fa-image" id="icone"></i> </label>
                <input type="file" class="d-none" name="picture" accept="image/*" id="img-input" onchange="showFile(event)" wire:model="picture">
            </div>
            <input type="text" name="message" placeholder="Type Message ..." class="form-control w-full" wire:model="content">
            <span class="input-group-append">
                <button type="submit" class="p-2 bg-blue-600 text-white" wire:click.prevent="store()">Send</button>
            </span>
        </div>

    </div>
</form>
