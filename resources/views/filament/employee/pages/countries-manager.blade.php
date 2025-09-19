<x-filament-panels::page>
    <div x-data="countriesApp()" x-init="fetchAll()" class="space-y-4">
        <div class="flex gap-4">
            <input x-model.debounce.400ms="q" @input="search()" placeholder="Search country..."
                class="px-3 py-2 border rounded w-1/3">
            <button @click="fetchAll()" class="px-3 py-2 bg-blue-600 text-white rounded">Fetch All</button>
        </div>

        <!-- Table for all countries -->
        <div class="bg-white shadow rounded p-4">
            <h3 class="font-semibold mb-2">Countries</h3>
            <div class="overflow-auto max-h-96">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 border-b">Name</th>
                            <th class="px-4 py-2 border-b">Capital</th>
                            <th class="px-4 py-2 border-b">Area</th>
                            <th class="px-4 py-2 border-b">Languages</th>
                            <th class="px-4 py-2 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="c in countries" :key="c.id || c.name">
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2" x-text="c.name"></td>
                                <td class="px-4 py-2" x-text="c.capital || '-'"></td>
                                <td class="px-4 py-2" x-text="c.area"></td>
                                <td class="px-4 py-2" x-text="formatArray(c.languages)"></td>
                                <td class="px-4 py-2">
                                    <button @click="addCountry(c)"
                                        class="px-2 py-1 bg-green-600 text-white rounded text-sm">Add</button>
                                </td>
                            </tr>
                        </template>
                        <tr x-show="countries.length === 0">
                            <td colspan="5" class="text-gray-500 text-center py-2">No countries</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- toast -->
        <div x-show="toast" x-transition class="fixed bottom-4 right-4 bg-black text-white px-4 py-2 rounded"
            x-text="toast"></div>
    </div>

    <script>
        function countriesApp() {
            return {
                q: '',
                countries: [],
                toast: null,

                fetchAll() {
                    fetch('/employee/countries/fetch')
                        .then(r => r.json())
                        .then(d => this.countries = d);
                },

                search() {
                    if (!this.q) return this.fetchAll();

                    fetch(`/employee/countries/search/${this.q}`)
                        .then(r => r.json())
                        .then(d => this.countries = d);
                },

                addCountry(c) {
                    const payload = {
                        name: c.name.common || c.name,
                        capital: (c.capital && c.capital[0]) || c.capital || null,
                        currencies: c.currencies || null,
                        languages: c.languages || null,
                        area: c.area || null,
                    };
                    fetch('/employee/countries', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content')
                            },
                            body: JSON.stringify(payload)
                        }).then(r => r.json())
                        .then(data => {
                            this.countries.unshift(data);
                            this.toast = 'Country added successfully';
                            setTimeout(() => this.toast = null, 3000);
                        });
                },

                formatArray(obj) {
                    if (!obj) return '';
                    if (typeof obj === 'object') return Object.values(obj).join(', ');
                    return obj;
                },
            };
        }
    </script>
</x-filament-panels::page>
