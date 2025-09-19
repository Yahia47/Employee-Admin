<x-filament-panels::page>
    <div class="space-y-4">
        <h2 class="text-xl font-bold">Table 3 "Delete"</h2>

        <x-filament::section>
            <table class="w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-10 py-6 text-left font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-6 text-left font-medium text-gray-500 uppercase">Name</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr>
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">Data 1</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">Data 2</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">Data 2</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">Data 2</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">Data 2</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">Data 2</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">Data 2</td>
                    </tr>
                </tbody>
            </table>
        </x-filament::section>


        <div class="flex gap-2">
            <x-filament::button color="danger" icon="heroicon-o-trash" wire:click="deleteAction">
                Delete
            </x-filament::button>
        </div>
    </div>
</x-filament-panels::page>
