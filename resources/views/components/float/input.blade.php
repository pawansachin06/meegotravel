@props([
    'name' => 'name',
    'label' => 'Label',
    'placeholder' => 'Enter placeholder',
    'class' => 'mb-4',
    'type' => 'text',
    'id' => uniqid(),
    'required' => false,
    'autofocus' => false,
    'value' => '',
])
<div class="relative {{ $class }}">
    <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" <?php echo $required ? 'required' : ''; ?> <?php echo $autofocus ? 'autofocus' : ''; ?> autocomplete="off" spellcheck="false" placeholder="{{ $placeholder }}" class="form-float-input peer block w-full rounded caret-primary-500 focus:border-primary-500 focus:ring-primary-200 placeholder-transparent placeholder:select-none" />
    <label for="{{ $id }}" class="inline-block rounded select-none pointer-events-none transition-all bg-white tracking-wide font-semibold px-1 absolute -top-3 left-3 text-sm peer-focus:text-sm peer-focus:text-primary-500 peer-focus:font-semibold peer-focus:-top-3 peer-placeholder-shown:text-lg peer-placeholder-shown:text-gray-700 peer-placeholder-shown:font-normal peer-placeholder-shown:top-2">{{ $label }}</label>
</div>