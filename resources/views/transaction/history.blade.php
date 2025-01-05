<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">
            Transaction History
        </h1>

        @if($transactions->isEmpty())
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
                <p class="text-gray-600 dark:text-gray-400">
                    You haven't made any ticket purchases yet.
                </p>
            </div>
        @else
            <div class="grid gap-4">
                @foreach($transactions as $transaction)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $transaction->event->nama }}
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Transaction ID: #{{ $transaction->id }}
                                </p>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-medium 
                                    @switch($transaction->status)
                                        @case('completed') text-green-600 @break
                                        @case('pending') text-yellow-600 @break
                                        @case('cancelled') text-red-600 @break
                                        @case('failed') text-red-600 @break
                                    @endswitch">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $transaction->created_at->format('d M Y H:i') }}
                                </p>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-md font-medium text-gray-800 dark:text-gray-200">
                                        Tickets
                                    </h3>
                                    @foreach($transaction->detailTransaksis as $detail)
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $detail->ticket->nama }} 
                                            ({{ $detail->quantity }} x IDR {{ number_format($detail->ticket->harga, 0) }})
                                        </p>
                                    @endforeach
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-gray-900 dark:text-gray-100">
                                        Total: IDR {{ number_format($transaction->grand_total, 0) }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-end space-x-2">
                            <a href="{{ route('transactions.show', $transaction->id) }}" 
                               class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                View Details
                            </a>
                            @if($transaction->status == 'completed')
                                <a href="{{ route('transactions.download', $transaction->id) }}" 
                                   class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                                    Download Ticket
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $transactions->links() }}
            </div>
        @endif
    </div>
</x-app-layout>