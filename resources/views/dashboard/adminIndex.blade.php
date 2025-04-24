<div class="w-full bg-white p-8 rounded-lg shadow-lg border border-gray-200 overflow-auto max-h-[80vh] min-h-[80vh]">
    <div class="flex justify-between items-center mb-5 overflow-auto">
        <h1 class="text-3xl font-bold mb-2 text-center text-gray-800">{{ $page_title }} records</h1>
    </div>
    @include('components.alert')
    <table class="min-w-full border border-gray-200 shadow-lg" id="{{ $resource }}-table">
        <thead class="bg-[#1A4798]">
            <tr class="text-white uppercase text-md leading-normal">
                @foreach ($columns as $column)
                <th class="py-3 px-4 cursor-pointer">
                    {{ $column }}
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-normal text-center">
            @foreach ($contestants as $record)
            <tr class="border border-gray-200 hover:bg-gray-100 transition-colors">
                <td class="py-1 px-4">{{ $record->first_name }} {{ $record->middle_name }} {{ $record->last_name }}</td>
                <td class="py-1 px-4">{{ $record->userDisability->disability->name ?? 'N/A' }}</td>
                <td class="py-1 px-4">{{ $record->scorePercent  }} %</td>
                <td class="py-1 px-4">{{ number_format($record->excel, 2) }} %</td>
                <td class="py-1 px-4">{{ number_format($record->ppt, 2)         }} %</td>
                <td class="py-1 px-4">{{ number_format($record->totalPercent, 2) }} %</td>

                <td class="py-1 px-4">
                    <div x-data="{ open: false, addExcelScore: false, addPptScore: false }"
                        class="relative inline-block text-left">
                        <button @click="open = !open"
                            class="inline-flex items-center p-2 text-white bg-[#1A4798] rounded-lg hover:bg-[#F4C027] hover:text-black hover:border border-[#F4C027] transition-colors"
                            aria-haspopup="true" :aria-expanded="open">
                            Action <i class="fa-solid fa-ellipsis-v mx-2"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-[#F4C027] z-10">
                            <div class="py-1">
                                <a href="#" @click.prevent="addExcelScore = true; open = false"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:text-white hover:border border-[#F4C027]">
                                    <i class="fa-solid fa-file-excel me-2"></i>Ms excel score
                                </a>
                                <a href="#" @click.prevent="addPptScore = true; open = false"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:text-white hover:border border-[#F4C027]">
                                    <i class="fa-solid fa-file-powerpoint me-2"></i>Ms PPT score
                                </a>
                            </div>
                        </div>
                        @include('dashboard.excel')
                        @include('dashboard.ppt')
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    $('#{{ $resource }}-table').DataTable({
        processing: true,
        serverSide: false,
        pageLength: 10,
        order: [
            [0, 'desc']
        ],

        dom: '<"flex justify-between items-center mb-2"lf>rt<"flex justify-between items-center mt-4"ip>',

        initComplete: function() {
            const table = this.api();

            const $searchInput = $('div.dataTables_filter input');
            $searchInput.addClass(
                'ml-2 px-4 py-1 border border-gray-300 rounded focus:outline-none ' +
                'focus:ring focus:ring-[#1A4798] focus:ring-opacity-50'
            );

            const $lengthSelect = $('div.dataTables_length select');
            $lengthSelect.addClass(
                'px-4 py-1 my-2 border border-gray-300 rounded focus:outline-none ' +
                'focus:ring focus:ring-[#1A4798] focus:ring-opacity-50'
            );
        },

        drawCallback: function(settings) {
            const $paginateButtons = $('div.dataTables_paginate .paginate_button');
            $paginateButtons.addClass(
                'px-4 py-2 text-black rounded-lg hover:bg-[#F4C027] disabled:opacity-50 ' +
                'disabled:cursor-not-allowed transition-colors'
            );

            const $currentPage = $('div.dataTables_paginate .paginate_button.current');
            $currentPage.removeClass('bg-gray-700 text-white');
            $currentPage.addClass(
                'bg-[#1A4798] text-white px-4 m-2 py-2 rounded-lg transition-colors hover:bg-[#1A4798]/90'
            );
        }
    });
});
</script>