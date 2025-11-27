@props([
  'name',
  'label' => null,
  'type' => 'text',
  'value' => '',
  'required' => false,
])

<div>
  @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-700 mb-1">{{ $label }}</label>
  @endif

  <input
    id="{{ $name }}"
    name="{{ $name }}"
    type="{{ $type }}"
    value="{{ old($name, $value) }}"
    {{ $required ? 'required' : '' }}
    {{ $attributes->merge(['class' => 'w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-200']) }}
  />

  @error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
  @enderror
</div>
