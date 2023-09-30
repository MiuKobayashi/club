<x-app-layout>
    <div class="m-5">
        <h2 class="mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">練習中の曲</h2>
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
                                    @foreach($practice->practicesongs as $practicesongs)
                                        <td class="bg-red-200 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{ $practicesongs->song->name }}</td>
                                        <td class="bg-red-100 text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{ $practicesongs->part->name }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </thread>
                        </table>
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
        <div class="mx-10 mt-5 flex justify-end hover:underline">
            <a href='/progress/create'>登録はこちら</a>
        </div>
        <h2 class="mb-4 text-left text-2xl font-bold text-pink-800 md:mb-6 lg:text-3xl underline">本番の曲</h2>
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
                                        <th class="bg-red-300 text-sm text-white font-semibold px-6 py-4 whitespace-nowrap" rowspan={{ $performance->parts_count }}> {{ $performance->name }} </th>
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
            @if(auth()->user()->admin)
            <div class="mx-10 mt-5 flex justify-end hover:underline">
                <a href='/progress/store'>曲の登録はこちら</a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
