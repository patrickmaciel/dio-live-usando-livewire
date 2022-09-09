<select {{ $attributes }} class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
    <option value="">{{ empty($default) ? 'Selecione' : $default }}</option>
    {{ $slot }}
</select>
