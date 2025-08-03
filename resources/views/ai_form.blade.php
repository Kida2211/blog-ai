<form method="POST" action="{{ route('ai.generate') }}">
    @csrf
    <label for="prompt" class="block mb-2">Enter blog title:</label>
    <input type="text" name="prompt" id="prompt" class="border w-full p-2 mb-4" required value="{{ old('prompt') }}">

    <label for="tone" class="block mb-2">Select tone:</label>
    <select name="tone" id="tone" class="border w-full p-2 mb-4">
        <option value="friendly" {{ old('tone') == 'friendly' ? 'selected' : '' }}>Friendly</option>
        <option value="professional" {{ old('tone') == 'professional' ? 'selected' : '' }}>Professional</option>
        <option value="informal" {{ old('tone') == 'informal' ? 'selected' : '' }}>Informal</option>
        <option value="persuasive" {{ old('tone') == 'persuasive' ? 'selected' : '' }}>Persuasive</option>
    </select>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2">Generate</button>
</form>

@error('error')
    <div class="text-red-600 mt-4">{{ $message }}</div>
@enderror

@isset($output)
    <div class="mt-6 p-4 border bg-gray-50">
        <h2 class="text-xl font-semibold">AI Response:</h2>
        <textarea class="w-full border mt-2 p-2" rows="10">{{ $output }}</textarea>
    </div>
@endisset
