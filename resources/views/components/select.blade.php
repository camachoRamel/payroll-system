@props([
  'name',
  'label' => null,
  'options' => [],
  'required' => false,
])

<div>
  @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-700 mb-1">
      {{ $label }}
    </label>
  @endif

  <select
    id="{{ $name }}"
    name="{{ $name }}"
    {{ $required ? 'required' : '' }}
    {{ $attributes->merge(['class' => 'w-full px-4 py-2 border rounded-lg bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-200']) }}
  >
    <option value="" disabled selected>Select a role</option>

    @foreach ($options as $value => $text)
      <option value="{{ $value }}" {{ old($name) == $value ? 'selected' : '' }}>
        {{ $text }}
      </option>
    @endforeach
  </select>

  @error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
  @enderror
</div>
