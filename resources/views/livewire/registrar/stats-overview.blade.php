<div>
    <div class="mb-5">
        <h1 class="text-xl text-gray-600 uppercase">
            Statistics Overview
        </h1>
    </div>
    <dl class="grid grid-cols-1 gap-5 sm:grid-cols-3">
        <x-shared.stats label="Pending Requests"
            value="{{ $stats['pending_request'] }}" />
        <x-shared.stats label="To Claim Today"
            value="{{ $stats['to_claim_today'] }}" />
        <x-shared.stats label="Total Request To Claim "
            value="{{ $stats['total_claim'] }}" />
        <x-shared.stats label="Waiting for Payments"
            value="{{ $stats['waiting_for_payment'] }}" />
    </dl>
</div>
