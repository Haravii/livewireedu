<div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form wire:submit="addUser">
        <div class="mb-3">
            <input type="text" name="name" class="form-control @error('form.name') is-invalid @enderror" wire:model.blur="form.name" wire:keydown.enter="addUser" placeholder="Имя">
            @error('form.name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <input type="email" class="form-control @error('form.email') is-invalid @enderror" wire:model.blur="form.email" wire:keydown.enter="addUser" placeholder="Email">
            @error('form.email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <input type="password" class="form-control @error('form.password') is-invalid @enderror" wire:model.blur="form.password" wire:keydown.enter="addUser" placeholder="Пароль">
            @error('form.password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <div wire:ignore>
                <select class="select2 form-select @error('form.country_id') is-invalid @enderror" wire:model="form.country_id">
                    <option selected>Выбери страну</option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        
        @error('form.country_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <input type="file" class="form-control @error('form.avatar') is-invalid @enderror" wire:model.blur="form.avatar" wire:keydown.enter="addUser">
            @error('form.avatar') <div class="invalid-feedback">{{ $message }}</div> @enderror

            <div wire:loading wire:target="form.avatar">Загрузка изображения...
                <div class="mt-2 spinner-border text-primary" role="status"></div>
            </div> 

            @if (!$errors->has('form.avatar') && $form->avatar)
                <img src="{{ $form->avatar->temporaryUrl() }}" height="100">
            @endif
        </div>

        

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary my-2">Добавить</button>
            <div class="spinner-border text-primary" role="status" wire:loading wire:target="addUser">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        </form>
</div>

@script
<script>
    $(document).ready(function() {
        let select2 = $('.select2');
        select2.select2();
        select2.on('change', function (e) {
            $wire.form.country_id = $(this).val();
        });
        $wire.on('user-created', () => {
            select2.val('Выбери страну').trigger('change');
        })
    });
</script>
@endscript