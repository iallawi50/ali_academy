<x-app-layout>
    <div class="py-12">
        <div class="container mx-auto px-4">
            <div class="bg-white p-6 rounded-lg shadow">
                <h1 class="text-2xl font-bold text-pink-600 mb-6">{{ __('invoices.title') }}</h1>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-right text-gray-700 border border-gray-200">
                        <thead class="bg-pink-100 text-pink-700 font-semibold">
                            <tr>
                                <th class="px-4 py-2 border">{{ __('invoices.id') }}</th>
                                <th class="px-4 py-2 border">{{ __('invoices.user') }}</th>
                                <th class="px-4 py-2 border">{{ __('invoices.course') }}</th>
                                <th class="px-4 py-2 border">{{ __('invoices.payment_status') }}</th>
                                <th class="px-4 py-2 border">{{ __('invoices.status') }}</th>
                                <th class="px-4 py-2 border">{{ __('invoices.amount') }}</th>
                                <th class="px-4 py-2 border">{{ __('invoices.date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($invoices as $invoice)
                                <tr class="hover:bg-pink-50">
                                    <td class="px-4 py-2 border">{{ $invoice->id }}</td>
                                    <td class="px-4 py-2 border">{{ $invoice->user->name ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $invoice->course->title ?? '-' }}</td>
                                    <td class="px-4 py-2 border">
                                        <span class="px-2 py-1 rounded text-white
                                            {{ $invoice->payment_status === 'paid' ? 'bg-green-500' : 'bg-red-500' }}">
                                            {{ __('invoices.' . ($invoice->payment_status ?? 'unpaid')) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        {{ __('invoices.' . ($invoice->status ?? 'open')) }}
                                    </td>
                                    <td class="px-4 py-2 border">{{ number_format($invoice->amount, 2) }}




                                    </td>
                                    <td class="px-4 py-2 border">{{ $invoice->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-4 text-center text-gray-500">
                                        {{ __('invoices.no_invoices') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
