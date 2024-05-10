<!-- language-selector.blade.php -->
<div class="flex items-center justify-center p-4">
    <form action="{{ route('language.set') }}" method="post">
        @csrf
        <select name="language" id="language" onchange="this.form.submit()" class="border-gray-300 rounded-md shadow-sm bg-gray-500 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
            <option value="es" {{ session('locale') == 'es' ? 'selected' : '' }}>Español</option>
        </select>
    </form>
</div>
