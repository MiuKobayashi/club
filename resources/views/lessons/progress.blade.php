<x-app-layout>
    <div class="m-5">
        <div class="mb-10 md:mb-16">
            <h2 id="practiceSongs" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
                <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">練習中の曲</span>
            </h2>
            <p class="mx-auto mt-10 max-w-screen-md text-center text-gray-500 md:text-lg">現在お稽古で練習中の曲の表です。曲が変わった場合は登録してください。</p>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="flex justify-center">
                            <table class="min-w-50 text-center border-separate">
                                <thead class="border-b-2">
                                    <tr>
                                        <th scope="col" class="bg-red-300 text-sm font-semibold text-gray-900 px-6 py-4">名前</th>
                                        <th scope="col" class="bg-red-200 text-sm font-semibold text-gray-900 px-6 py-4">曲名</th>
                                        <th scope="col" class="bg-red-100 text-sm font-semibold text-gray-900 px-6 py-4">パート</th>
                                    </tr>
                                        @foreach($practices as $practice)
                                            <tr class="border-b-2 text-white">
                                                <td class="bg-red-300 text-sm text-white font-semibold px-6 py-4 whitespace-nowrap">{{ $practice->name }}</td>
                                                @if($practice->practicesongs->isEmpty())
                                                    <td class="bg-red-200 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">-</td>
                                                    <td class="bg-red-100 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">-</td>
                                                @else
                                                    @foreach($practice->practicesongs as $practicesongs)
                                                        <td class="bg-red-200 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{ $practicesongs->song->name }}</td>
                                                        <td class="bg-red-100 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{ $practicesongs->part->name }}</td>
                                                    @endforeach
                                                @endif
                                            </tr>
                                        @endforeach
                                </thread>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-10 flex justify-end">
            <form action="{{route('done')}}" method="POST">
                @csrf
                <div class="flex sm:col-span-2">
                    <button type="submit" name="progress[inprogress]" onClick="return confirm('お稽古が終了しましたか？');" class="inline-block rounded-lg bg-pink-900 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-pink-900 transition duration-100 hover:bg-pink-700 focus-visible:ring active:bg-pink-700 md:text-base">完了</button>
                </div>
            </form>
        </div>
        <div class="mx-10 mt-5 flex justify-end text-indigo-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
            </svg>
            <a href="/progress/create" class="font-semibold hover:underline">進捗状況の登録はこちら</a>
        </div>
        <div class="mb-10 md:mb-16">
            <h2 id="performanceSongs" class="mx-auto mt-5 text-center text-2xl font-bold text-pink-800">
                <span class="bg-red-200 border-red-100 rounded-md py-2 px-4 md:mb-6 lg:text-3xl">本番の曲</span>
            </h2>
            <p class="mx-auto mt-10 max-w-screen-md text-center text-gray-500 md:text-lg">演奏会で演奏する曲目です。
                <div class="flex items-center justify-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                    がある曲は、クリックするとYouTubeの動画に飛べます。
                </div>
            </p>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="flex justify-center">
                        <table class="min-w-50 text-center border-separate">
                            <thead class="border-b-2">
                                <tr>
                                    <th scope="col" class="bg-red-300 text-sm font-semibold text-gray-900 px-6 py-4">曲名</th>
                                    <th scope="col" class="bg-red-200 text-sm font-semibold text-gray-900 px-6 py-4">パート</th>
                                    <th scope="col" class="bg-red-100 text-sm font-semibold text-gray-900 px-6 py-4">名前</th>
                                </tr>
                                    @foreach($performances as $performance)
                                        <tr class="border-b-2 text-white">    
                                            <th class="bg-red-300 text-sm text-center text-white font-semibold px-6 py-4 whitespace-nowrap" rowspan={{ $performance->parts_count }}>
                                                @if($performance->url)
                                                    <div class="flex items-center justify-center">
                                                      <a href="{{ $performance->url }}" target="_brank" class="hover:underline">
                                                        {{ $performance->name }}
                                                      </a>
                                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                                      </svg>
                                                    </div>
                                                @else
                                                    {{ $performance->name }}
                                                @endif</th>
                                            @foreach($performance->parts as $part)
                                                <td class="bg-red-200 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{ $part->name }}</td>
                                                    <td class="text-left bg-red-100 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                                    @foreach($performance->practicesongs as $user)
                                                        @if($user->part_id==$part->id)
                                                            {{ $user->user->name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            @endforeach
                                    @endforeach
                            </thread>
                        </table>
                    </div>
                </div>
                <div class="mx-10 mt-5 flex justify-end text-indigo-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                    </svg>
                    <a href="/progress/movie" class="font-semibold hover:underline">曲目の動画一覧はこちら</a>
                </div>
                @if(auth()->user()->admin)
                    <div class="mx-10 mt-5 flex justify-end text-indigo-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-indigo-100">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                        <a href="/progress/song" class="font-semibold hover:underline bg-indigo-100">曲目の登録はこちら</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>