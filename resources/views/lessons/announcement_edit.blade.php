<x-app-layout>
    <div class="m-5">
        <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">お知らせ編集</h2>
        </div>    
        <form action="/{{ $announcements->id }}" method="POST" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
            @csrf
            @method('PUT')
            <div class="sm:col-span-2">
                <label for="announcement" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*タイトル</label>
                <input type="text" name="announcement[title]" value="{{ $announcements->title }}" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"/>
                <p class="title__error" style="color:darkred">{{ $errors->first('announcement.title') }}</p>                
            </div>
            <div class="sm:col-span-2">
                <label for="announcement" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">*説明</label>
                <textarea name="announcement[description]" class="h-20 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">{{ $announcements->description }}</textarea>
                <p class="body__error" style="color:darkred">{{ $errors->first('announcement.description') }}</p>
            </div>
            <div class="flex items-center justify-between sm:col-span-2">
                <button type="submit" class="inline-block rounded-lg bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-700 transition duration-100 hover:bg-pink-700 focus-visible:ring active:bg-pink-700 md:text-base">送信</button>
                    <span class="text-sm text-gray-500">*Required</span>
            </div>
        </form>
    </div>
</x-app-layout>
